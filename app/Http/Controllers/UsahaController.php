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
        $usahaList = Usaha::whereHas('user', function($query) {
            $query->where('is_approved', 1);
        })->with(['user.personalData', 'kategoriUmkm'])->get();
    
        return view('backend.pages.business.index', compact('usahaList'));
    }
    

    // Menampilkan detail usaha tertentu
    public function Detail($id)
    {
        $usaha = Usaha::with(['user.personalData', 'kategoriUmkm'])->findOrFail($id);

        return view('backend.pages.business.show', compact('usaha'));
    }
}
