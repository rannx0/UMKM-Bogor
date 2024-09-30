<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PersonalData;
use App\Models\Provinsi;
use App\Models\KabupatenKota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Usaha;
use App\Models\UmkmCategory;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUMKMController extends Controller
{
    public function showForm()
    {
        $provinsi = Provinsi::all();
        $umkmCategories = UmkmCategory::all();
        
        return view('frontend.register.umkm-register', compact('provinsi','umkmCategories')); // Ganti dengan nama view yang sesuai
    }

    public function handleStep(Request $request)
    {
        $step = $request->input('step');

        switch ($step) {
            case 1:
                return $this->handleAccountStep($request);
            case 2:
                return $this->handlePersonalDataStep($request);
            case 3:
                return $this->handleUmkmDataStep($request);
            default:
                return response()->json(['success' => false, 'message' => 'Invalid step']);
        }
    }

    public function getKabupatenKota(Request $request)
    {
        $provinsi_id = $request->input('provinsi_id');
        $kabupaten_kota = KabupatenKota::where('provinsi_id', $provinsi_id)->get();
        return response()->json($kabupaten_kota);
    }

    public function getKecamatan(Request $request)
    {
        $kabupaten_kota_id = $request->input('kabupaten_kota_id');
        $kecamatan = Kecamatan::where('kabupaten_kota_id', $kabupaten_kota_id)->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request)
    {
        $kecamatan_id = $request->input('kecamatan_id');
        $kelurahan = Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($kelurahan);
    }


    protected function handleAccountStep(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Simpan data step 1 ke session
        $request->session()->put('register.account', $request->only('username', 'email', 'password'));

        return response()->json(['success' => true, 'step' => 2]);
    }

    protected function handlePersonalDataStep(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:100',
            'nik' => 'required|string|max:16|unique:personal_data,nik',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_telepon' => 'required|string|max:15',
            'provinsi_id' => 'required|integer|exists:provinsis,id',
            'kabupaten_kota_id' => 'required|integer|exists:kabupaten_kotas,id',
            'kecamatan_id' => 'required|integer|exists:kecamatans,id',
            'kelurahan_id' => 'required|integer|exists:kelurahans,id',
            'alamat' => 'required|string|max:100',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
    
        // Simpan data step 2 ke session
        $request->session()->put('register.personal_data', $request->all());
    
        return response()->json(['success' => true, 'step' => 3]);
    }

    protected function handleUmkmDataStep(Request $request)
    {
        // Validate umkm_data form
        $umkmValidator = Validator::make($request->all(), [
            'nama_usaha' => 'required|string|max:255',
            'nib' => 'nullable|string|max:255',
            'deskripsi_usaha' => 'required|string',
            'kategori_umkm' => 'required|exists:umkm_categories,id',
            'tanggal_berdiri' => 'required|date',
            'alamat_usaha' => 'required|string|max:255',
            'provinsi_id' => 'required|integer|exists:provinsis,id',
            'kabupaten_kota_id' => 'required|integer|exists:kabupaten_kotas,id',
            'kecamatan_id' => 'required|integer|exists:kecamatans,id',
            'kelurahan_id' => 'required|integer|exists:kelurahans,id',
            'koordinat_usaha' => 'required|string|max:255',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'modal_usaha' => 'required|numeric',
            'aset_usaha' => 'required|numeric',
            'penghasilan_bulanan' => 'required|numeric',
            'jumlah_tenaga_kerja' => 'required|integer',
        ]);
    
        // Validate keuangan form
        $keuanganValidator = Validator::make($request->all(), [
            'modal_usaha' => 'required|numeric|between:0,99999999999999.99',
            'asset_usaha' => 'required|numeric|between:0,99999999999999.99',
            'penghasilan_bulanan' => 'required|numeric|between:0,99999999999999.99',
            'penghasilan_tahunan' => 'required|numeric|between:0,99999999999999.99',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ]);
    
        if ($umkmValidator->fails() || $keuanganValidator->fails()) {
            return response()->json(['success' => false, 'errors' => array_merge($umkmValidator->errors(), $keuanganValidator->errors())]);
        }
    
        // Save umkm_data to session
        $request->session()->put('register.umkm_data', $request->all());
    
        // Save keuangan data to session
        $request->session()->put('register.keuangan_data', $request->all());
    
        // Save all data to database
        $accountData = $request->session()->get('register.account');
        $personalData = $request->session()->get('register.personal_data');
        $umkmData = $request->session()->get('register.umkm_data');
        $keuanganData = $request->session()->get('register.keuangan_data');
    
        // Save data user
        $user = User::create([
            'username' => $accountData['username'],
            'email' => $accountData['email'],
            'password' => Hash::make($accountData['password']),
        ]);
    
        // Save data personal
        PersonalData::create(array_merge($personalData, ['user_id' => $user->id]));
    
        // Save data umkm
        UmkmData::create(array_merge($umkmData, ['user_id' => $user->id]));
    
        // Save data keuangan
        KeuanganData::create(array_merge($keuanganData, ['usaha_id' => $umkm->id]));
    
        return response()->json(['success' => true, 'step' => 4]);
    }
}
