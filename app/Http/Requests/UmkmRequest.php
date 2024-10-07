<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UmkmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
            'modal_usaha' => 'required|numeric|between:0,99999999999999.99',
            'asset_usaha' => 'required|string|max:255',
            'penghasilan_bulanan' => 'required|numeric|between:0,99999999999999.99',
            'penghasilan_tahunan' => 'required|numeric|between:0,99999999999999.99',
            'jumlah_tenaga_kerja' => 'required|integer|min:0',
        ];
    }
}
