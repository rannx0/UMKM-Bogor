<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroContent;
use Illuminate\Support\Facades\Storage;

class HeroContentController extends Controller
{
    public function index($id = 1)
    {
        // Ambil data konten hero berdasarkan ID atau buat instance baru jika tidak ada
        $heroContent = HeroContent::find($id) ?? new HeroContent;
    
        return view('backend.pages.configurations.hero-start', compact('heroContent'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Temukan hero content berdasarkan ID atau buat baru jika tidak ada
        $heroContent = HeroContent::find($request->input('id')) ?? new HeroContent;

        // Fungsi untuk mengunggah file dan menyimpan nama file ke database
        $heroContent->image = $this->uploadFile($request, 'image', $heroContent->image, 'public/hero');

        // Update semua data kecuali image dan _token
        $heroContent->fill($request->except(['image', '_token']));

        // Simpan ke database
        $heroContent->save();

        return redirect()->route('hero.index')->with('success', 'Data konten hero berhasil disimpan.');
    }

    // Fungsi untuk mengelola upload file
    private function uploadFile($request, $fieldName, $currentFile, $storagePath)
    {
        if ($request->hasFile($fieldName)) {
            // Hapus file lama jika ada
            if ($currentFile) {
                Storage::delete($storagePath . '/' . $currentFile);
            }

            // Simpan file baru
            $file = $request->file($fieldName);
            $fileName = time() . '_' . $fieldName . '.' . $file->getClientOriginalExtension();
            $file->storeAs($storagePath, $fileName);

            return $fileName;
        }

        // Kembalikan nama file lama jika tidak ada file baru yang diunggah
        return $currentFile;
    }
}
