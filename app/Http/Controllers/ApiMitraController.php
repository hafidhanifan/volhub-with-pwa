<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Carbon\Carbon;
use GuzzleHttp\Client;

use RealRashid\SweetAlert\Facades\Alert;



class ApiMitraController extends Controller
{
    public function showLoginMitra()
    {
        return view('mitra.layout.api.api-login');
    }
    public function showRegisterMitra()
    {
        return view('mitra.layout.api.api-signup');
    }

    public function registerMitraAction(Request $request)
    {
        $existing_username = Mitra::where('username', $request->username)->first();
        if ($existing_username) {
            Alert::error('Oops !', 'Username sudah digunakan :(');
            return redirect()->back()->withInput(); 
        }

        try {
            $client = new Client();
            $response = $client->post('https://api-volhub.cloud/employer/registrasi', [
                'json' => [
                    'nama_mitra' => $request->nama_mitra,
                    'username' => $request->username,
                    'email_mitra' => $request->email_mitra,
                    'password' => $request->password, // Kirim password sebelum enkripsi jika API membutuhkannya
                    'nomor_telephone' => $request->nomor_telephone,
                ],
            ]);
    
            // Cek respons dari API
            if ($response->getStatusCode() == 200) {
                Alert::success('Hore!', 'Akun berhasil ditambahkan di API dan database lokal');
            } else {
                Alert::warning('Perhatian', 'Akun berhasil ditambahkan di database lokal, tetapi gagal di API');
            }
        } catch (\Exception $e) {
            Alert::error('Oops!', 'Terjadi kesalahan saat menghubungi API: ' . $e->getMessage());
        }


        return redirect('/mitraApi/login');
    }

    public function loginMitra(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            $client = new Client();
            $response = $client->post('https://api-volhub.cloud/employer/login', [
                'json' => $credentials,
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);

                if (!empty($responseData['token']) && !empty($responseData['data'])) {
                    session([
                        'token' => $responseData['token'],
                        'id_mitra' => $responseData['data']['id_mitra'],
                        'username' => $responseData['data']['username'],
                        'nama_mitra' => $responseData['data']['nama_mitra'],
                    ]);

                    return redirect()->route('api.mitra.kegiatan', ['id' => $responseData['data']['id_mitra']]);
                }
            }

            Alert::error('Login Gagal', 'Username atau password salah.');
            return back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    public function showKegiatanPage($id)
    {
        $token = session('token');

        if (!$token) {
            Alert::error('Autentikasi Diperlukan', 'Silakan login terlebih dahulu.');
            return redirect()->route('api.mitra.login');
        }

        $idMitra = session('id_mitra');
        if ($idMitra != $id) {
            return redirect()->route('api.mitra.kegiatan', ['id' => $idMitra])
                ->withErrors('Anda tidak memiliki akses ke data ini.');
        }

        try {
            $client = new Client();

            // Ambil data kegiatan
            $responseActivities = $client->get('https://api-volhub.cloud/employer/activities', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'query' => ['employerId' => $id],
            ]);

            $responseData = json_decode($responseActivities->getBody(), true);
            $kegiatans = $responseData['data'] ?? [];

            foreach ($kegiatans as &$kegiatan) {
                $kegiatan['formatted_kegiatan_date'] = isset($kegiatan['tgl_kegiatan'])
                    ? Carbon::parse($kegiatan['tgl_kegiatan'])->translatedFormat('d F Y')
                    : null;

                $kegiatan['formatted_penutupan_date'] = isset($kegiatan['tgl_penutupan'])
                    ? Carbon::parse($kegiatan['tgl_penutupan'])->translatedFormat('d F Y')
                    : null;
            }

            // Ambil data mitra
            $responseProfile = $client->get('https://api-volhub.cloud/employer/profile', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
                'query' => ['employerId' => $id],
            ]);

            $mitra = json_decode($responseProfile->getBody(), true)['data'] ?? [];

            return view('mitra.layout.api.api-activity', compact('kegiatans', 'mitra'))->with('token', $token);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $status = $e->getResponse()->getStatusCode();
            if (in_array($status, [401, 403])) {
                session()->forget('token');
                return redirect()->route('api.mitra.login')
                    ->withErrors('Sesi Anda telah habis atau token tidak valid. Silakan login ulang.');
            }

            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}