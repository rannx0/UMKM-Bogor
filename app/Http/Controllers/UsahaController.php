<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usaha;

class UsahaController extends Controller
{
    // Menampilkan daftar usaha dengan informasi terkait user dan personal data
    public function Index()
    {
        // Ambil semua usaha beserta relasi user dan kategori UMKM
        $usahaList = Usaha::with(['user.personalData', 'kategoriUmkm'])->get();

        // Tampilkan view dengan data usaha
        return view('backend.pages.business.index', compact('usahaList'));
    }

    // Menampilkan detail usaha tertentu
    public function Detail($id)
    {
        // Cari usaha berdasarkan ID dan muat relasi terkait
        $usaha = Usaha::with(['user.personalData', 'kategoriUmkm'])->findOrFail($id);

        // Tampilkan halaman detail usaha
        return view('backend.pages.business.detail', compact('usaha'));
    }
}
