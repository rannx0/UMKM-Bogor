<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna sudah login
        if (Auth::check()) {
            // Memeriksa apakah pengguna memiliki role 'User'
            if (Auth::user()->hasRole('User')) {
                return $next($request); // Lanjutkan jika pengguna memiliki role 'User'
            } else {
                // Jika tidak memiliki role 'User', redirect ke halaman error atau halaman lain
                return redirect()->route('error-page')->with('error', 'Anda tidak memiliki akses.');
            }
        }

        // Jika belum login, redirect ke halaman login
        return redirect()->route('login');
    }
}
