<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

    //proses login
    public function login(Request $request)
    {
        // cek validasi
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // pengecekan kondisi benar atau salah
        if (auth()->attempt(request(['email', 'password']))) {
            return redirect()->route('mapel.index');
        }
        // kondisi salah
        return redirect()->back()->with('error', 'Email atau Password salah');
    }
    // fungsi logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}