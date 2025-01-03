<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Mitra;
use App\Models\Kegiatan;
use App\Models\Pendaftar;
use App\Models\Kategori;
use App\Models\Benefit;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\Interview;
use App\Models\Note;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class MitraController extends Controller
{
    public function showKegiatanPage($id)
    {
        $mitra = Mitra::find($id);
        
        $kegiatans = Kegiatan::withCount('pendaftars')
                            ->where('id_mitra', $mitra->id_mitra)
                            ->get();

        foreach ($kegiatans as $kegiatan) {
            // Format tanggal kegiatan
            if ($kegiatan->tgl_kegiatan) {
                $kegiatanDate = Carbon::parse($kegiatan->tgl_kegiatan);
                $kegiatan->formatted_kegiatan_date = $kegiatanDate->translatedFormat('d F Y');
            } else {
                $kegiatan->formatted_kegiatan_date = null; // Tanggal tidak tersedia
            }

            // Format tanggal penutupan
            if ($kegiatan->tgl_penutupan) {
                $penutupanDate = Carbon::parse($kegiatan->tgl_penutupan);
                $kegiatan->formatted_penutupan_date = $penutupanDate->translatedFormat('d F Y');
            } else {
                $kegiatan->formatted_penutupan_date = null; // Tanggal tidak tersedia
            }
        }

        return view('mitra.layout.activity', compact('mitra', 'kegiatans'));
    }

    public function showAddKegiatanPage($id)
    {
        $mitra = Mitra::find($id);
                            
        $kategori = Kategori::all();
        $sistemKegiatan = ['offline', 'online'];
        return view('mitra.layout.add-kegiatan', compact('kategori', 'sistemKegiatan', 'mitra'));
    }

    public function addKegiatanAction(Request $request, $id)
    {
        $mitra = Mitra::find($id);

        $kegiatan = new Kegiatan;

        $kegiatan->id_mitra = $mitra->id_mitra;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->id_kategori = $request->kategori;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->lama_kegiatan = $request->lama_kegiatan;
        $kegiatan->sistem_kegiatan = $request->sistem_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->tgl_penutupan = $request->tgl_penutupan;
        $kegiatan->tgl_kegiatan = $request->tgl_kegiatan;

        $kegiatan->save();

        Alert::success('Hore!', 'Data Berhasil Ditambahkan');
        return redirect()->route('mitra.kegiatan', ['id' => $mitra->id_mitra]);
    }

    public function showDetailKegiatanPage($id, $id_keg)
    {
        $mitra = Mitra::find($id);
        $kegiatan = Kegiatan::with(['kategori'])->find($id_keg);
        if (!$kegiatan) {
            return redirect()->route('mitra.kegiatan')->with('error', 'Kegiatan tidak ditemukan.');
        } 
        return view('mitra.layout.detail-kegiatan', compact('kegiatan', 'mitra'));
    }

    public function showEditKegiatanPage($id, $id_keg)
    {
        $mitra = Mitra::find($id);
        $kegiatan = Kegiatan::with(['kategori'])->find($id_keg);
        $kategori = Kategori::all();
        $sistemKegiatan = ['offline', 'online'];
        return view('mitra.layout.edit-kegiatan', compact('mitra','kegiatan', 'kategori', 'sistemKegiatan'));
    }

    public function editKegiatanAction(Request $request, $id, $id_keg)
    {
        $mitra = Mitra::find($id);
        $kegiatan = Kegiatan::find($id_keg);
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->id_kategori = $request->kategori;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->lama_kegiatan = $request->lama_kegiatan;
        $kegiatan->sistem_kegiatan = $request->sistem_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->tgl_penutupan = $request->tgl_penutupan;
        $kegiatan->tgl_kegiatan = $request->tgl_kegiatan;

       
        Alert::success('Hore!', 'Data Berhasil Diedit');
        $kegiatan->save();

        return redirect()->route('mitra.kegiatan', ['id' => $mitra->id_mitra])->with('success', 'Kegiatan berhasil diupdate.');
    }

    public function removeKegiatanAction($id, $id_keg)
    {
        $mitra = Mitra::find($id);

        if (!$mitra) {
            return redirect()->back()->with('error', 'Mitra tidak ditemukan.');
        }

        $kegiatan = Kegiatan::where('id_mitra', $mitra->id_mitra)
                            ->where('id_kegiatan', $id_keg)
                            ->first();

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
        }

        // Cek apakah ada pendaftar pada kegiatan ini
        $pendaftar = Pendaftar::where('id_kegiatan', $id_keg)->exists();

        if ($pendaftar) {
            return redirect()->route('mitra.kegiatan', ['id' => $mitra->id_mitra])->with('error', 'Oops! Sepertinya masih ada pendaftar yang mengikuti kegiatan ini.');
        }

        // Hapus kegiatan
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // All About Kegiatan Benefit
    public function showAddBenefitKegiatanPage($id, $id_keg)
    {
        $mitra = Mitra::find($id);
        $kegiatan = Kegiatan::find($id_keg);
        return view('mitra.layout.add-kegiatan-benefit', compact('mitra', 'kegiatan'));
    }

    public function addBenefitKegiatanAction(Request $request, $id_keg)
    {
        $kegiatan = Kegiatan::findOrFail($id_keg);
        $benefit = Benefit::firstOrCreate(['nama_benefit' => $request->input('nama_benefit')]);
        $kegiatan->benefits()->attach($benefit->id_benefit);
        Alert::success('Hore!', 'Data Berhasil Ditambahkan');

        return redirect()->back();
    }

    public function removeBenefit($id_keg, $id_benefit)
    {     
        $kegiatan = Kegiatan::findOrFail($id_keg);

        if (!$kegiatan) {
            Alert::error('Oops !', 'Data Tidak Ditemukan');
            return redirect()->back();
        }
    
        try {
            $kegiatan->benefits()->detach($id_benefit);
            Alert::success('Hore !', 'Data Berhasil Dihapus');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Oops !', 'Sepertinya kamu masih butuh data ini :(');
            return redirect()->back();

        }
    }

    // All About Kegiatan Kriteria
    public function showAddKriteriaKegiatanPage($id, $id_keg)
    {
        $mitra = Mitra::find($id);
        $kegiatan = Kegiatan::find($id_keg);
        return view('mitra.layout.add-kegiatan-kriteria', compact('mitra', 'kegiatan'));
    }

    public function addKriteriaKegiatanAction(Request $request, $id_keg)
    {
        $kegiatan = Kegiatan::findOrFail($id_keg);
        $kriteria = Kriteria::firstOrCreate(['nama_kriteria' => $request->input('nama_kriteria')]);
        $kegiatan->kriterias()->attach($kriteria->id_kriteria);
        Alert::success('Hore!', 'Data Berhasil Ditambahkan');

        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function removeKriteria($id_keg, $id_kriteria)
    {
        
        $kegiatan = Kegiatan::findOrFail($id_keg);

        if (!$kegiatan) {
            Alert::error('Oops !', 'Data Tidak Ditemukan');
            return redirect()->back();
        }
    
        try {
            $kegiatan->kriterias()->detach($id_kriteria);
            Alert::success('Hore !', 'Data Berhasil Dihapus');
            return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Oops !', 'Sepertinya kamu masih butuh data ini :(');
            return redirect()->back();

        }
    }

    public function showEditMitraPage($id)
    {
        $mitra = Mitra::find($id);
        return view('mitra.layout.profile', compact('mitra'));
    }

    public function editMitraAction(Request $request, $id)
    {
        $setting = Mitra::find($id);
        $setting->nama_mitra = $request->nama_mitra;
        $setting->bio = $request->bio;
        $setting->industri = $request->industri;
        $setting->ukuran_perusahaan = $request->ukuran_perusahaan;
        $setting->situs = $request->situs;
        $setting->alamat = $request->alamat;
        $setting->nomor_perusahaan = $request->nomor_perusahaan;
        $setting->deskripsi = $request->deskripsi;

        // if ($request->filled('password')) {
        //     // Enkripsi password
        //     $setting->password = Hash::make($request->password);
        // }
        $setting->save();

        return redirect()->route('mitra.profile', ['id' => $id->id_mitra])->with('success', 'Profile Mitra berhasil diupdate.');
    }

    // public function editFotoProfileAction(Request $request, $id)
    // {
    //     $mitra = Mitra::findOrFail($id);

    //     if ($request->isMethod('post')) {
    //         // Upload new image
    //         $request->validate([
    //             'profil_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         ]);

    //         if($mitra->logo && Storage::exist('public/logo/' . $mitra->logo)) {
    //             // Delete old picture
    //             Storage::delete('public/logo/' . $mitra->logo);
    //         }

    //         $filename = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
    //         $request->file('profile_picture')->storeAs('public/logo', $filename);

    //         $mitra->logo = $filename;
    //         $mitra->save();

    //         return back()->with('success', 'Foto berhasil diperbarui.');
    //     } elseif ($request->isMethod('delete')) {
    //         // Delete picture
    //         if ($mitra->logo && Storage::exists('public/logo/' . $mitra->logo)) {
    //             Storage::delete('public/logo/' . $mitra->logo);
    //         }
    
    //         $mitra->logo = null;
    //         $mitra->save();
    
    //         return back()->with('success', 'Foto berhasil dihapus.');
    //     }
    //     return back()->with('error', 'Permintaan tidak valid.');
    // }

    public function editFotoProfileAction(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);

        // Menghapus gambar lama jika ada
        if ($mitra->logo) {
            $oldImage = storage_path('app/public/logo/' . $mitra->logo);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        // Proses file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $newName = $mitra->nama_mitra . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension(); // Nama unik
            $path = $file->storeAs('public/logo', $newName); // Simpan ke storage

            // Simpan nama file ke database
            $mitra->logo = $newName;
            $mitra->save();

            return redirect()->back()->with('success');
        }
    }

    public function deleteFotoProfileAction($id)
    {
        $mitra = Mitra::findOrFail($id);

        // Menghapus gambar lama jika ada
        if ($mitra->logo) {
            $oldImage = storage_path('app/public/logo/' . $mitra->logo);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            // Set logo menjadi null
            $mitra->logo = null;
            $mitra->save();
        }

        return redirect()->back()->with('success');
    }

    //All about Pendaftar
    public function showPendaftarPage($id)
    {
    $mitra = Mitra::find($id);

    // Ambil semua kegiatan yang didirikan oleh mitra tersebut
    $kegiatans = Kegiatan::where('id_mitra', $mitra->id_mitra)->get();

    // Ambil semua ID kegiatan
    $kegiatanIds = $kegiatans->pluck('id_kegiatan');

    // Ambil semua pendaftar yang terkait dengan kegiatan-kegiatan tersebut
    $pendaftar = Pendaftar::whereIn('id_kegiatan', $kegiatanIds)->get();

    return view('mitra.layout.pendaftar', compact('mitra', 'kegiatans', 'pendaftar'));
    }

    public function showDetailPendaftarPage($id, $id_pendaftar)
    {
        $mitra = Mitra::find($id);
        $statusInterview = ['Not scheduled yet', 'On progress', 'Interview Completed'];
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        if (!$pendaftar) {
            return redirect()->route('mitra.pendaftar')->with('error', 'Pendaftar tidak ditemukan.');
        }

        // Ambil kegiatan berdasarkan id_kegiatan dari pendaftar
        $kegiatan = Kegiatan::find($pendaftar->id_kegiatan);

        $statusPenutupan = null; // Status default

        if ($kegiatan) {
            $tglPenutupan = Carbon::parse($kegiatan->tgl_penutupan);
            $endOfDay = $tglPenutupan->endOfDay();
            
            if (Carbon::now()->isSameDay($tglPenutupan)) {
                $statusPenutupan = 'Today';
            } elseif (Carbon::now()->greaterThan($endOfDay)) {
                $statusPenutupan = 'Closed';
            } else {
                $kegiatan->sisa_hari = Carbon::now()->diffInDays($endOfDay, false);
            }
        }

        $formattedInterviewDate = null;
        $formattedNoteDate = null;

        // Pengecekan status interview
        if ($pendaftar->tgl_interview && $pendaftar->lokasi_interview) {
            // Format tanggal interview
            $interviewDate = Carbon::parse($pendaftar->tgl_interview);
            $formattedInterviewDate = $interviewDate->translatedFormat('d F Y');

            // Cek jika tanggal interview sudah lewat
            $endOfInterviewDay = $interviewDate->endOfDay();
            if (Carbon::now()->greaterThan($endOfInterviewDay)) {
                $pendaftar->status_interview = 'Interview Completed';
            } else {
                $pendaftar->status_interview = 'On progress';
            }
        } else {
            $pendaftar->status_interview = 'Not scheduled yet';
        }
        $pendaftar->save();

        // Format tanggal note jika ada
        if ($pendaftar->tgl_note) {
            $formattedNoteDate = Carbon::parse($pendaftar->tgl_note)->translatedFormat('d F Y');
        }

        // Menghitung jumlah hari sejak tanggal pendaftaran
        $tglPendaftaran = Carbon::parse($pendaftar->tgl_pendaftaran);
        if ($tglPendaftaran->isToday()) {
            $daysAgo = 'Today';
        } else {
            $daysAgo = $tglPendaftaran->diffInDays(Carbon::now(), false) . ' days ago';
        }

        // Menghitung jumlah pengalaman user
        $experienceCount = $pendaftar->user->experiences()->count();

        return view('mitra.layout.detail-pendaftar', compact(
            'mitra',
            'kegiatan',
            'pendaftar',
            'daysAgo',
            'experienceCount',
            'statusInterview',
            'formattedInterviewDate',
            'formattedNoteDate',
            'statusPenutupan'
        ));
    }

    public function addInterviewAction(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        $pendaftar->tgl_interview = $request->tgl_interview;
        $pendaftar->status_interview = 'Not scheduled yet';
        $pendaftar->lokasi_interview = $request->lokasi_interview;

        $pendaftar->save();

        $pendaftar->status_applicant = 'Interview';
        $pendaftar->save();

        // Format tanggal dengan Carbon hingga akhir hari
        $interviewDate = Carbon::parse($pendaftar->tgl_interview);
        $formattedInterviewDate = $interviewDate->translatedFormat('d F Y');

        // Cek apakah tanggal interview sudah lewat dari pukul 23:59
        $now = Carbon::now();
        $endOfInterviewDay = $interviewDate->endOfDay();

        // Update status interview berdasarkan tanggal
        if ($now->greaterThan($endOfInterviewDay)) {
            $statusInterview = 'Interview Completed';
        } else {
            $statusInterview = 'On progress';
        }


        // return response()->json([
        //     'success' => true,
        //     'message' => 'Interview schedule added successfully',
        //     'tgl_interview' => $formattedInterviewDate,
        //     'lokasi_interview' => $pendaftar->lokasi_interview,
        //     'status_interview' => $statusInterview,
        // ]);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function addNoteAction(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        $pendaftar->tgl_note = $request->tgl_note;
        $pendaftar->note_interview = $request->note_interview;

        $pendaftar->save();

        return redirect()->back()
                 ->with('success', 'Status pendaftaran berhasil diperbarui.');        
    }

    public function updateStatusHire(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);
        $pendaftar->status_applicant = 'Hire';
        $pendaftar->note_to_applicant = $request->note_to_applicant;

        $pendaftar->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function updateStatusReject(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);
        $pendaftar->status_applicant = 'Reject';
        $pendaftar->note_to_applicant = $request->note_to_applicant;

        $pendaftar->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function shortlist($id, $id_pendaftar)
    {
        $mitra = Mitra::find($id);
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);
        $kegiatans = Kegiatan::where('id_mitra', $mitra->id_mitra)->get();

        $pendaftar->status_applicant = 'Shortlist';
        foreach ($kegiatans as $kegiatan) {
            // Menghitung sisa hari dengan penutupan dihitung sampai akhir hari (23:59:59)
            $sisaHari = Carbon::now()->diffInDays(Carbon::parse($kegiatan->tgl_penutupan)->endOfDay(), false);
        
            // Pastikan sisa hari tidak negatif
            $kegiatan->sisa_hari = max($sisaHari, 0);
        }
        $pendaftar->save();

        return redirect()->back()->with('targetStage', 'shortlisted');
    }

    public function interview($id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        $pendaftar->status_applicant = 'Interview';
        $pendaftar->save();
        
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
            ]);
        }

        return redirect()->back()->with('targetStage', 'interviewContent');
    }

    public function hire(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        $pendaftar->status_applicant = 'Hire';
        $pendaftar->note_to_applicant = $request->note_to_applicant;
        $pendaftar->save();
        
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
            ]);
        }

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function reject(Request $request, $id_pendaftar)
    {
        $pendaftar = Pendaftar::with(['user'])->find($id_pendaftar);

        $pendaftar->status_applicant = 'Reject';
        $pendaftar->note_to_applicant = $request->note_to_applicant;
        $pendaftar->save();
        

        // Logika untuk menentukan status interview
        if ($pendaftar->interview) {
            $pendaftar->interview->status_interview = 'Interview Completed';
            $pendaftar->interview->save();
            $interviewStatus = 'Interview Completed';
        } else {
            $interviewStatus = 'Not scheduled yet';
        }

        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'interviewStatus' => $interviewStatus,
            ]);
        }

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }


    // Change password
    public function showChangePasswordPage (Request $request, $id){
    $mitra = Mitra::find($id);

        return view('mitra.layout.change-password',compact('mitra'));
    }
}