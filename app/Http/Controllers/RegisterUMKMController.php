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
use Illuminate\Support\Facades\DB;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Simpan data step 1 ke session
        $request->session()->put('register.account', $request->all());

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
        // Validasi umkm_data form
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
            'kordinat_usaha' => 'required|string|max:255',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
        ]);
    
        // Validasi keuangan form
        $keuanganValidator = Validator::make($request->all(), [
            'modal_usaha' => 'required|numeric|between:0,99999999999999.99',
            'asset_usaha' => 'required|numeric|between:0,99999999999999.99',
            'penghasilan_bulanan' => 'required|numeric|between:0,99999999999999.99',
            'penghasilan_tahunan' => 'required|numeric|between:0,99999999999999.99',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ]);
    
        if ($umkmValidator->fails() || $keuanganValidator->fails()) {
            return response()->json(['success' => false, 'errors' => array_merge($umkmValidator->errors()->toArray(), $keuanganValidator->errors()->toArray())]);
        }
    
        // Simpan data UMKM dan keuangan di session
        $umkmData = $request->only(['nama_usaha', 'nib', 'deskripsi_usaha', 'kategori_umkm', 'tanggal_berdiri', 'alamat_usaha', 'provinsi_id', 'kabupaten_kota_id', 'kecamatan_id', 'kelurahan_id', 'kordinat_usaha', 'rt', 'rw']);
        $keuanganData = $request->only(['modal_usaha', 'asset_usaha', 'penghasilan_bulanan', 'penghasilan_tahunan', 'jumlah_tenaga_kerja']);

    
        $request->session()->put('register.umkm_data', $umkmData);
        $request->session()->put('register.keuangan_data', $keuanganData);
    
    
        return response()->json(['success' => true, 'message' => 'Data UMKM berhasil disimpan']);
    }
    

    public function submitFinalStep(Request $request)
    {
        // Ambil data dari session
        $accountData = session('register.account');
        $personalData = session('register.personal_data');
        $umkmData = session('register.umkm_data');
        $keuanganData = session('register.keuangan_data');
    
    
        // Cek jika data UMKM dan Keuangan telah terinput
        if (empty($umkmData) || empty($keuanganData)) {
            $missingData = [];
    
            if (empty($umkmData)) {
                $missingData[] = 'Data UMKM';
            }
    
            if (empty($keuanganData)) {
                $missingData[] = 'Data Keuangan';
            }
    
            return response()->json([
                'success' => false, 
                'message' => implode(' dan ', $missingData) . ' belum terinput'
            ]);
        }
    
        // Simpan data ke database dalam transaksi
        try {
            DB::transaction(function () use ($accountData, $personalData, $umkmData, $keuanganData) {
                // Simpan data user
                $user = User::create($accountData);
    
                // Simpan data personal terkait user
                $user->personalData()->create($personalData);
    
                // Simpan data UMKM terkait user
                $umkm = $user->usaha()->create($umkmData);
    
                // Simpan data keuangan terkait UMKM
                $umkm->keuangan()->create($keuanganData);
            });
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }
    
        // Hapus session setelah data disimpan
        session()->forget(['register.account', 'register.personal_data', 'register.umkm_data', 'register.keuangan_data']);
    
        // Kembalikan respons sukses
        return response()->json(['success' => true, 'step' => 4]);
    }
    

}
