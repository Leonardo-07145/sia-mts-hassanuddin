<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('login_admin.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // dd('Berhasil Login');

        if(Auth::guard('web')->attempt($credentials) && auth()->user()->role === 0){
            $request->session()->regenerate();
            return redirect()->intended('/guru');
        } elseif (Auth::guard('web')->attempt($credentials) && auth()->user()->role === 1){
            $request->session()->regenerate();
            return redirect()->intended('/jadwal');
        } elseif (Auth::guard('web')->attempt($credentials) && auth()->user()->role === 2){
            $request->session()->regenerate();
            return redirect()->intended('/presensi');
        } elseif (Auth::guard('web')->attempt($credentials) && auth()->user()->role === 3){
            $request->session()->regenerate();
            return redirect()->intended('/dataguru');
        } elseif (Auth::guard('siswa')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/pembayaransiswa');
        }

        return back()->with('loginError', 'login failed!!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
