<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index($id = 1)
    {
        // Ambil data About Us berdasarkan ID atau buat instance baru jika tidak ada
        $aboutUs = AboutUs::find($id) ?? new AboutUs;
    
        return view('backend.pages.configurations.about-us', compact('aboutUs'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'focus_points' => 'nullable|array',  // Validasi sebagai array
            'commitment' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,svg,png,jpg,gif|max:2048',
        ]);
    
        // Temukan about us berdasarkan ID atau buat baru jika tidak ada
        $aboutUs = AboutUs::find($request->input('id')) ?? new AboutUs;
    
        // Ubah focus_points ke format JSON sebelum menyimpan
        $aboutUs->focus_points = json_encode($request->input('focus_points'));
    
        // Fungsi untuk mengunggah file dan menyimpan nama file ke database
        $aboutUs->image = $this->uploadFile($request, 'image', $aboutUs->image, 'public/about-us');
    
        // Update semua data kecuali image dan _token
        $aboutUs->fill($request->except(['image', '_token', 'focus_points']));
        
        // Simpan ke database
        $aboutUs->save();
    
        return redirect()->route('about.index')->with('success', 'Data About Us berhasil disimpan.');
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
