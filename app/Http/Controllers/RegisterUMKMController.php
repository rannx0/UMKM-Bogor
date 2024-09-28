<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PersonalData;
use App\Models\Usaha;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUMKMController extends Controller
{
    public function showUserForm()
    {
        return view('register'); // assumes register.blade.php is in the views directory
    }

    public function registerUser(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Return the user ID to the JavaScript code
        return response()->json(['user_id' => $user->id]);
    }

    public function registerPersonalData(Request $request)
    {
        // Validate personal data input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'nomor_telepon' => 'required|string',
        ]);

        // Create a new personal data record
        $personalData = new PersonalData();
        $personalData->user_id = $request->input('user_id');
        $personalData->nama_lengkap = $validatedData['nama_lengkap'];
        $personalData->nik = $validatedData['nik'];
        $personalData->tempat_lahir = $validatedData['tempat_lahir'];
        $personalData->tanggal_lahir = $validatedData['tanggal_lahir'];
        $personalData->jenis_kelamin = $validatedData['jenis_kelamin'];
        $personalData->nomor_telepon = $validatedData['nomor_telepon'];
        $personalData->save();

        // Return a success response
        return response()->json(['message' => 'Personal data saved successfully']);
    }

    public function showBusinessForm($userId)
    {
        // Get provinces, categories, etc.
        $provinces = Province::all(); // Dropdown untuk provinsi
        $categories = UmkmCategory::all(); // Kategori UMKM
        return view('auth.register_business', [
            'user_id' => $userId,
            'provinces' => $provinces,
            'categories' => $categories,
        ]); // Tahap 3
    }

    public function registerBusiness(Request $request, $userId)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'nib' => 'nullable|string|max:255',
            'deskripsi_usaha' => 'required|string|max:1000',
            'kategori_umkm' => 'required|exists:umkm_categories,id',
            'tanggal_berdiri' => 'required|date',
            'alamat_usaha' => 'required|string|max:500',
            'kordinat_usaha' => 'nullable|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
            'kelurahan_id' => 'required|exists:kelurahan,id',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
        ]);

        Usaha::create([
            'user_id' => $userId,
            'nama_usaha' => $validated['nama_usaha'],
            'nib' => $validated['nib'],
            'deskripsi_usaha' => $validated['deskripsi_usaha'],
            'kategori_umkm' => $validated['kategori_umkm'],
            'tanggal_berdiri' => $validated['tanggal_berdiri'],
            'alamat_usaha' => $validated['alamat_usaha'],
            'kordinat_usaha' => $validated['kordinat_usaha'],
            'kecamatan_id' => $validated['kecamatan_id'],
            'kelurahan_id' => $validated['kelurahan_id'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
        ]);

        return redirect()->route('register.financial', ['user' => $userId]);
    }

    public function showFinancialForm($userId)
    {
        return view('auth.register_financial', ['user_id' => $userId]); // Tahap 4
    }

    public function registerFinancial(Request $request, $userId)
    {
        $validated = $request->validate([
            'modal_usaha' => 'required|numeric|min:0',
            'asset_usaha' => 'required|numeric|min:0',
            'penghasilan_bulanan' => 'required|numeric|min:0',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ]);

        $usaha = Usaha::where('user_id', $userId)->first();
        
        Keuangan::create([
            'usaha_id' => $usaha->id,
            'modal_usaha' => $validated['modal_usaha'],
            'asset_usaha' => $validated['asset_usaha'],
            'penghasilan_bulanan' => $validated['penghasilan_bulanan'],
            'jumlah_tenaga_kerja' => $validated['jumlah_tenaga_kerja'],
        ]);

        // Redirect to a success page or dashboard
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }
}
