<?php

namespace App\Http\Controllers;

use App\Models\UmkmCategory;
use App\Models\AboutUs;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\HeroContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DashboardFrontendController extends Controller
{
    public function index() {
        // Ambil top 6 kategori UMKM dengan jumlah UMKM terbanyak
        $topCategories = UmkmCategory::withCount('usaha')
        ->orderBy('usaha_count', 'desc')
        ->limit(6)
        ->get();

        
    
        $aboutUs = AboutUs::find(1);

        // Kirim data ke view
        return view('frontend.dashboard', compact('topCategories', 'aboutUs'));
    }
}
