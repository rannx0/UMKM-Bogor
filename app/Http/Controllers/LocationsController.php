<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel terkait dan melakukan eager loading jika perlu
        $provinsis = Provinsi::all();
        $kabupatenKotas = KabupatenKota::with('provinsi')->get();
        $kecamatans = Kecamatan::with('kabupatenKota')->get();
        $kelurahans = Kelurahan::with('kecamatan')->get();

        // Mengirimkan data ke view 'lokasi'
        return view('backend.pages.locations.database', compact('provinsis', 'kabupatenKotas', 'kecamatans', 'kelurahans'));
    }
}
