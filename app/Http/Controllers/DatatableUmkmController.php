<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UmkmCategory;
use App\Models\Kecamatan;
use App\Models\Usaha;
use DB;

class DatatableUmkmController extends Controller
{
    public function index(){
        return view('frontend.pages.data-umkm.umkm-list');
    }

    public function umkmdatatable()
    {
        // Ambil semua kategori UMKM
        $categories = UmkmCategory::all();
    
        // Ambil kecamatan beserta usaha yang berhubungan dengan kategori yang ada
        $kecamatanData = Kecamatan::with(['usaha' => function($query) use ($categories) {
            $query->whereIn('umkm_category_id', $categories->pluck('id'));
        }, 'kabupatenKota'])->get();

        // Hitung total UMKM per kategori
        $totalUmkmPerCategory = [];
        foreach ($categories as $category) {
            $totalUmkmPerCategory[$category->id] = Usaha::where('umkm_category_id', $category->id)->count();
        }
    
        return view('frontend.pages.data-umkm.umkm-list', compact('kecamatanData', 'categories', 'totalUmkmPerCategory'));
    }
    
    public function showKecamatanUmkm($nama_kecamatan, $id)
    {
        // Cari kecamatan berdasarkan nama
        $kecamatan = Kecamatan::where('nama', $nama_kecamatan)->firstOrFail();
        
        // Ambil usaha terkait di kecamatan tersebut
        $umkmData = Usaha::where('kecamatan_id', $kecamatan->id)->get();
        
        return view('frontend.pages.data-umkm.umkm-per-kecamatan', compact('umkmData', 'kecamatan'));
    }
    
    public function showUmkmDetail($nama_kecamatan, $nama_usaha, $id)
    {
        // Cari kecamatan berdasarkan slug
        $kecamatan = Kecamatan::where(DB::raw('lower(nama)'), strtolower(str_replace('-', ' ', $nama_kecamatan)))
                    ->firstOrFail();
    
        // Ambil usaha berdasarkan slug dan id
        $usaha = Usaha::where(DB::raw('lower(nama_usaha)'), strtolower(str_replace('-', ' ', $nama_usaha)))
                        ->where('id', $id)
                        ->where('kecamatan_id', $kecamatan->id)
                        ->with(['kategoriUmkm', 'user.personalData'])
                        ->firstOrFail();
    
        return view('frontend.pages.data-umkm.detail-umkm', compact('usaha'));
    }
    
    
}
