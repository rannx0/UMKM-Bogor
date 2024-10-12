<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PersonalData;
use App\Models\Usaha;
use App\Models\Keuangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role 'User' jika belum ada
        if (!Role::where('name', 'User')->exists()) {
            Role::create(['name' => 'User']);
        }

        // Loop untuk membuat beberapa data UMKM
        for ($i = 1; $i <= 5; $i++) {
            // Membuat user baru
            $user = User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password' . $i),
            ]);

            // Assign role ke user
            $user->assignRole('User');

            // Data Personal
            PersonalData::create([
                'user_id' => $user->id,
                'nama_lengkap' => 'User ' . $i,
                'nik' => '1234567890' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'tempat_lahir' => 'Kota ' . $i,
                'tanggal_lahir' => '1990-01-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'jenis_kelamin' => 'Laki-laki',
                'nomor_telepon' => '0812345678' . $i,
                'provinsi_id' => 1, // Ganti sesuai ID Provinsi di database
                'kabupaten_kota_id' => 1, // Ganti sesuai ID Kabupaten/Kota di database
                'kecamatan_id' => 1, // Ganti sesuai ID Kecamatan di database
                'kelurahan_id' => 1, // Ganti sesuai ID Kelurahan di database
                'alamat' => 'Jalan Mawar No. ' . $i,
            ]);

            // Data Usaha
            $umkm = Usaha::create([
                'user_id' => $user->id,
                'nama_usaha' => 'Usaha ' . $i,
                'nib' => 'NIB12345' . $i,
                'deskripsi_usaha' => 'Deskripsi usaha ' . $i,
                'umkm_category_id' => 4, // Ganti sesuai ID Kategori UMKM di database
                'tanggal_berdiri' => '2010-01-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'alamat_usaha' => 'Alamat Usaha No. ' . $i,
                'provinsi_id' => 1,
                'kabupaten_kota_id' => 1,
                'kecamatan_id' => 1,
                'kelurahan_id' => 1,
                'kordinat_usaha' => '7.5666,110.8105',
                'rt' => '01',
                'rw' => '02',
            ]);

            // Data Keuangan
            Keuangan::create([
                'usaha_id' => $umkm->id,
                'modal_usaha' => rand(10000000, 50000000), // Modal random antara 10 juta hingga 50 juta
                'asset_usaha' => rand(11000000, 55000000),
                'penghasilan_bulanan' => rand(5000000, 20000000), // Penghasilan bulanan random
                'penghasilan_tahunan' => rand(60000000, 240000000), // Penghasilan tahunan random
                'jumlah_tenaga_kerja' => rand(5, 20), // Jumlah tenaga kerja random
            ]);
        }
    }
}
