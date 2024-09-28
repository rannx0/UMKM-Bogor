<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KabupatenKota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatans = Kecamatan::with('kabupatenKota')->get();
        return view('backend.pages.District.index', compact('kecamatans'));
    }

    public function create()
    {
        $kabupatenKotas = KabupatenKota::all();
        return view('backend.pages.District.create', compact('kabupatenKotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_kota_id' => 'required|exists:kabupaten_kotas,id',
            'nama' => 'required|string|max:255',
        ]);

        Kecamatan::create($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kabupatenKotas = KabupatenKota::all();
        return view('kecamatan.edit', compact('kecamatan', 'kabupatenKotas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kabupaten_kota_id' => 'required|exists:kabupaten_kotas,id',
            'nama' => 'required|string|max:255',
        ]);

        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update($request->all());
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus.');
    }
}
