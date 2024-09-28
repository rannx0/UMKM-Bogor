<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsis = Provinsi::all();
        return view('backend.pages.province.index', compact('provinsis'));
    }

    public function create()
    {
        return view('backend.pages.province.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Provinsi::create($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $provinsi = Provinsi::findOrFail($id);
        $provinsi->update($request->all());
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }
}
