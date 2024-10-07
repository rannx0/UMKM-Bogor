<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the personal data.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua data dari tabel personal_data beserta semua relasi
        $personalData = PersonalData::with(['user', 'provinsi', 'kabupatenKota', 'kecamatan', 'kelurahan'])->get();

        // Return view ke halaman list data personal
        return view('backend.pages.personal_data.index', compact('personalData'));
    }

    /**
     * Display the specified personal data by user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ambil data personal berdasarkan ID user beserta semua relasi
        $personalData = PersonalData::with(['user', 'provinsi', 'kabupatenKota', 'kecamatan', 'kelurahan'])->where('user_id', $id)->firstOrFail();
        $tanggalLahir = Carbon::parse($personalData->tanggal_lahir);
        $umur = $tanggalLahir->age;
        // Return view ke halaman detail personal data
        return view('backend.pages.personal_data.show', compact('personalData', 'umur'));
    }
}
