<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Mitra;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    // All About Dashboard 
    public function showKategori() 
    {
        $kategori = Kategori::all();
        return view('admin.layout.kategori', compact('kategori'));
    }

    public function showAddKategoriPage()
    {
        return view('admin.layout.add-kategori');
    }

    public function showEditKategoriPage($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.layout.edit-kategori', compact('kategori'));
    }
    
    public function addKategoriAction(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->kategori;
        $kategori->save();
        Alert::success('Hore!', 'Data Berhasil Ditambahkan');
        
        return redirect('/admin/kategori');
    }

    public function editKategoriAction(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->kategori;
        $kategori->save();
        Alert::success('Hore!', 'Data Berhasil Diedit');

        return redirect('/admin/kategori');
    }

    public function deleteKategoriAction($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            Alert::error('Oops !', 'Data Tidak Ditemukan');
            return redirect()->route('admin.kategori');
        }
    
        try {
            $kategori->delete();
            Alert::success('Hore !', 'Data Berhasil Dihapus');
            return redirect()->route('admin.kategori');

        } catch (\Exception $e) {
            Alert::error('Oops !', 'Sepertinya kamu masih butuh data ini :(');
            return redirect()->route('admin.kategori');

        }
    }

    //All About User
    public function showUserPage()
    {
        $user = User::all();
        return view('admin.layout.user', compact('user'));
    }

    public function showEmployerPage()
    {
        $employer = Mitra::all();
        return view('admin.layout.employer', compact('employer'));
    }


    // All About Setting
    public function showSettingPage()
    {
        $setting = Admin::all();
        return view('admin.layout.setting', compact('setting'));
    }

    public function showEditSettingPage($id)
    {
        $setting = Admin::find($id);
        return view('admin.layout.edit-setting', compact('setting'));
    }

    public function editSettingAction(Request $request, $id)
    {
        $setting = Admin::find($id);
        $setting->username = $request->username;
        $setting->password = $request->password;
        if ($request->filled('password')) {
            // Enkripsi password
            $setting->password = Hash::make($request->password);
        }
        $setting->save();

        return redirect()->route('admin.setting', ['id' => $id])->with('success', 'Setting Admin berhasil diupdate.');
    }
    
}
