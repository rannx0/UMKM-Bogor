<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UmkmCategory;

class UmkmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Makanan',
            'Pangan',
            'Gas',
            'Kendaraan',
            'Kerajinan',
            'Fashion',
            'Kantin Sekolah',
            'Kuliner',
            'Otomotif',
            'Pendidikan',
            'PKL',
            'Teknologi Internet',
            'Rumah Warung Makan',
            'Agrobisnis',
            'Minuman',
            'Jasa',
            'Kesehatan',
            'Warung Sembako',
            'Lainnya',
        ];

        foreach ($categories as $category) {
            UmkmCategory::create([
                'nama' => $category,
            ]);
        }
    }
}
