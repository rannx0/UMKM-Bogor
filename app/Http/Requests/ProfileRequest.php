<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
        ];
    }

    public function messages()
{
    return [
        'nama_lengkap.required' => 'Nama lengkap is required.',
        'nama_lengkap.string' => 'Nama lengkap must be a string.',
        'nama_lengkap.max' => 'Nama lengkap cannot be more than 100 characters.',
        
        'nik.required' => 'NIK is required.',
        'nik.string' => 'NIK must be a string.',
        'nik.max' => 'NIK cannot be more than 16 characters.',
        'nik.unique' => 'NIK already exists in our database.',
        
        'tempat_lahir.required' => 'Tempat lahir is required.',
        'tempat_lahir.string' => 'Tempat lahir must be a string.',
        'tempat_lahir.max' => 'Tempat lahir cannot be more than 50 characters.',
        
        'tanggal_lahir.required' => 'Tanggal lahir is required.',
        'tanggal_lahir.date' => 'Tanggal lahir must be a valid date.',
        
        'jenis_kelamin.required' => 'Jenis kelamin is required.',
        'jenis_kelamin.in' => 'Jenis kelamin must be either Laki-laki or Perempuan.',
        
        'nomor_telepon.required' => 'Nomor telepon is required.',
        'nomor_telepon.string' => 'Nomor telepon must be a string.',
        'nomor_telepon.max' => 'Nomor telepon cannot be more than 15 characters.',
        
        'provinsi_id.required' => 'Provinsi is required.',
        'provinsi_id.integer' => 'Provinsi must be an integer.',
        'provinsi_id.exists' => 'Provinsi does not exist in our database.',
        
        'kabupaten_kota_id.required' => 'Kabupaten/kota is required.',
        'kabupaten_kota_id.integer' => 'Kabupaten/kota must be an integer.',
        'kabupaten_kota_id.exists' => 'Kabupaten/kota does not exist in our database.',
        
        'kecamatan_id.required' => 'Kecamatan is required.',
        'kecamatan_id.integer' => 'Kecamatan must be an integer.',
        'kecamatan_id.exists' => 'Kecamatan does not exist in our database.',
        
        'kelurahan_id.required' => 'Kelurahan is required.',
        'kelurahan_id.integer' => 'Kelurahan must be an integer.',
        'kelurahan_id.exists' => 'Kelurahan does not exist in our database.',
        
        'alamat.required' => 'Alamat is required.',
        'alamat.string' => 'Alamat must be a string.',
        'alamat.max' => 'Alamat cannot be more than 100 characters.',
    ];
}
}
