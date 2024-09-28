<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('backend.pages.village.index', compact('kelurahans'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('backend.pages.village.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama' => 'required|string|max:255',
        ]);

        Kelurahan::create($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatans = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama' => 'required|string|max:255',
        ]);

        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->update($request->all());
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil dihapus.');
    }
}
