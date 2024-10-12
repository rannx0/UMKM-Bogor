<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PersonalData;
use App\Models\Usaha;
use App\Models\UmkmCategory;
use App\Models\Keuangan;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UmkmRequest;
use Spatie\Permission\Models\Role;

class RegistrationController extends Controller
{
    public function showForm()
    {
        $provinsis = Provinsi::all();
        $umkmCategories = UmkmCategory::all();
        return view('frontend.newregister.register', [
            'umkmCategories' => $umkmCategories,
            'provinsis' => $provinsis,
            'accountData' => session('accountData', []),
            'profileData' => session('profileData', []),
            'umkmData' => session('umkmData', [])
        ]);
    }

    public function SuccessForm()
    {
        return view('frontend.newregister.succes');
    }

    public function checkStep($step, Request $request)
    {
        switch ($step) {
            case 1:
                $accountRequest = app(AccountRequest::class);
                // Jika validasi berhasil, simpan data
                return $this->saveAccountData($accountRequest);
                
            case 2:
                $profileRequest = app(ProfileRequest::class);
                // Jika validasi berhasil, simpan data
                return $this->saveProfileData($profileRequest);
                
            case 3:
                $umkmRequest = app(UmkmRequest::class);
                // Jika validasi berhasil, simpan data
                return $this->saveUmkmData($umkmRequest);
                
            default:
                return response()->json(['error' => 'Invalid step'], 422);
        }
    }

    public function checkAccount(AccountRequest $request)
    {
        return response()->json(['valid' => true]);
    }

    public function checkProfile(ProfileRequest $request)
    {
        return response()->json(['valid' => true]);
    }

    public function checkUmkm(UmkmRequest $request)
    {
        return response()->json(['valid' => true]);
    }

    public function saveAccountData(AccountRequest $request)
    {
        session(['accountData' => $request->validated()]);
        return response()->json(['success' => true, 'step' => 2]);
    }

    // save function

    public function saveProfileData(ProfileRequest $request)
    {
        session(['profileData' => $request->validated()]);
        return response()->json(['success' => true, 'step' => 3]);
    }

    public function saveUmkmData(UmkmRequest $request)
    {
        $validatedData = $request->validated();

        session([
            'umkmData' => array_intersect_key($validatedData, array_flip([
                'nama_usaha', 'nib', 'deskripsi_usaha', 'umkm_category_id', 'tanggal_berdiri',
                'alamat_usaha', 'provinsi_id', 'kabupaten_kota_id', 'kecamatan_id', 'kelurahan_id',
                'kordinat_usaha', 'rt', 'rw'
            ])),
            'keuanganData' => array_intersect_key($validatedData, array_flip([
                'modal_usaha', 'asset_usaha', 'penghasilan_bulanan', 'penghasilan_tahunan', 'jumlah_tenaga_kerja'
            ]))
        ]);

        return response()->json(['success' => true, 'step' => 4]);
    }

    public function finishRegistration()
    {
        try {
            DB::beginTransaction();
            
            $accountData = session('accountData');
            $profileData = session('profileData');
            $umkmData = session('umkmData');
            $keuanganData = session('keuanganData');

            $user = User::create([
                'name' => $accountData['name'],
                'email' => $accountData['email'],
                'password' => Hash::make($accountData['password']),
            ]);

            $user->assignRole('User');

            PersonalData::create(array_merge($profileData, ['user_id' => $user->id]));
            $umkm = Usaha::create(array_merge($umkmData, ['user_id' => $user->id]));
            Keuangan::create(array_merge($keuanganData, ['usaha_id' => $umkm->id]));

            DB::commit();

            session()->flush();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error saving data.' . $e->getMessage()]);
        }
    }
}
