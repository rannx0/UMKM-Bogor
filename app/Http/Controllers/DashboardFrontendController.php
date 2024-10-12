<?php

namespace App\Http\Controllers;

use App\Models\UmkmCategory; // Pastikan model KategoriUmkm di-import
use Illuminate\Http\Request;

class DashboardFrontendController extends Controller
{
    public function index() {
        // Ambil top 6 kategori UMKM dengan jumlah UMKM terbanyak
        $topCategories = UmkmCategory::withCount('usaha')
        ->orderBy('usaha_count', 'desc')
        ->limit(6)
        ->get();
    

        // Kirim data ke view
        return view('frontend.dashboard', compact('topCategories'));
    }
}
