<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan formulir login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial dan ingat pengguna jika opsi remember dipilih
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Untuk checkbox "Remember me"

        if (Auth::attempt($credentials, $remember)) {
            // Login sukses, redirect berdasarkan role pengguna
            $user = Auth::user();

            if ($user->hasRole('superadmin')) {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home'); // Redirect ke halaman umum untuk user biasa
            }
        }

        // Jika gagal login, kembalikan dengan pesan error
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput(); // Agar input tetap terisi
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
