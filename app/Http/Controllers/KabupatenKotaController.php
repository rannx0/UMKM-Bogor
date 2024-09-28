<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    // Menampilkan daftar kabupaten/kota
    public function index()
    {
        $kabupatenKotas = KabupatenKota::with('provinsi')->get(); // Mengambil kabupaten/kota beserta provinsinya
        return view('backend.pages.city.index', compact('kabupatenKotas'));
    }

    // Form untuk membuat kabupaten/kota baru
    public function create()
    {
        $provinsis = Provinsi::all(); // Mengambil semua provinsi untuk dropdown
        return view('backend.pages.city.create', compact('provinsis'));
    }

    // Menyimpan kabupaten/kota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi_id' => 'required|exists:provinsis,id',
        ]);

        KabupatenKota::create([
            'nama' => $request->nama,
            'provinsi_id' => $request->provinsi_id,
        ]);

        return redirect()->route('kabupaten_kota.index')->with('success', 'Kabupaten/Kota berhasil ditambahkan.');
    }

    // Form untuk mengedit kabupaten/kota
    public function edit($id)
    {
        $kabupatenKota = KabupatenKota::findOrFail($id);
        $provinsis = Provinsi::all();
        return view('kabupaten_kota.edit', compact('kabupatenKota', 'provinsis'));
    }

    // Memperbarui kabupaten/kota
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'provinsi_id' => 'required|exists:provinsis,id',
        ]);

        $kabupatenKota = KabupatenKota::findOrFail($id);
        $kabupatenKota->update([
            'nama' => $request->nama,
            'provinsi_id' => $request->provinsi_id,
        ]);

        return redirect()->route('kabupaten_kota.index')->with('success', 'Kabupaten/Kota berhasil diperbarui.');
    }

    // Menghapus kabupaten/kota
    public function destroy($id)
    {
        $kabupatenKota = KabupatenKota::findOrFail($id);
        $kabupatenKota->delete();

        return redirect()->route('kabupaten_kota.index')->with('success', 'Kabupaten/Kota berhasil dihapus.');
    }
}
