<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mitra;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    //Auth Admin
    public function showLoginForm()
    {
        return view('admin.layout.login');
    }

    public function login(Request $request)
    { 
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard', ['id' => Auth::guard('admin')->user()->id]));
        }

        Alert::error('Oops !', 'Username atau Password salah :(');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    // Auth Mitra
    public function showLoginMitra()
    {
        return view('mitra.layout.login');
    }
    public function showRegisterMitra()
    {
        return view('mitra.layout.signup');
    }

    public function registerMitraAction(Request $request)
    {
        $existing_username = Mitra::where('username', $request->username)->first();
        if ($existing_username) {
            Alert::error('Oops !', 'Username sudah digunakan :(');
            return redirect()->back()->withInput(); 
        }

        $register = new Mitra;
        $register->nama_mitra = $request->nama_mitra;
        $register->username = $request->username;
        $register->email_mitra = $request->email_mitra;
        $register->password = $request->password;
        $register->nomor_telephone = $request->nomor_telephone;
        $register->save();

        if ($request->filled('password')) {
            // Enkripsi password
            $register->password = Hash::make($request->password);
        }

        $register->save();
        Alert::success('Hore!', 'Akun Berhasil Ditambahkan');


        return redirect('/mitra/login');
    }

    public function loginMitra(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('mitra')->attempt($credentials)) {
            $mitra = Auth::guard('mitra')->user();
            return redirect()->route('mitra.dashboard', ['id' => $mitra->id_mitra]);
        }
    

        Alert::error('Oops !', 'Username atau Password salah :(');
        return back();
    }

    public function logoutMitra(Request $request)
    {
        Auth::guard('mitra')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/mitra/login');
    }

    // Auth User
    public function showLoginUser()
    {
        return view('user.layout.login');
    }

    public function showRegisterUser()
    {
        return view('user.layout.signup');
    }

    public function registerUserAction(Request $request)
    {
        $existing_username = User::where('username', $request->username)->first();
        if ($existing_username) {
            Alert::error('Oops !', 'Username sudah digunakan :(');
            return redirect()->back()->withInput(); 
        }

        $register = new User;
        $register->nama_user = $request->nama_user;
        $register->username = $request->username;
        $register->email_user = $request->email_user;
        $register->password = $request->password;
        $register->nomor_telephone = $request->nomor_telephone;
        $register->save();

        if ($request->filled('password')) {
            // Enkripsi password
            $register->password = Hash::make($request->password);
        }

        $register->save();
        Alert::success('Hore!', 'Akun Berhasil Ditambahkan');


        return redirect('/user/login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/user/kegiatan/{id}');
        }

        Alert::error('Oops !', 'Username atau Password salah :(');
        return back();
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
