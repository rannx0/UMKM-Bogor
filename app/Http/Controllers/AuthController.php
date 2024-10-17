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

    public function LoginUser()
    {
        return view('frontend.newregister.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Ambil kredensial dan ingat pengguna jika opsi "remember me" dipilih
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Untuk checkbox "Remember me"

        if (Auth::attempt($credentials, $remember)) {
            // Login sukses, ambil user yang sedang login
            $user = Auth::user();

            // Cek role pengguna dan redirect ke halaman yang sesuai
            if ($user->hasRole('Superadmin')) {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->hasRole('Admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('Manager')) {
                return redirect()->route('manager.dashboard');
            } elseif ($user->hasRole('Administrator')) {
                return redirect()->route('administrator.dashboard');
            } elseif ($user->hasRole('CEO')) {
                return redirect()->route('ceo.dashboard');
            } elseif ($user->hasRole('UMKM Management')) {
                return redirect()->route('umkm-management.dashboard');
            } elseif ($user->hasRole('Configurations Management')) {
                return redirect()->route('config-management.dashboard');
            } elseif ($user->hasRole('User')) {
                return redirect()->route('home'); // Redirect ke halaman umum untuk user biasa
            }
            
        }

        // Jika gagal login, kembalikan dengan pesan error
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Password do not match'
        ])->withInput(); // Agar input tetap terisi
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
