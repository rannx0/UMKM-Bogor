<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Faq::insert([
            [
                'question' => 'Bagaimana cara mendaftar UMKM di sistem ini?',
                'answer' => 'Anda dapat mendaftar UMKM dengan membuat akun di platform kami dan mengisi formulir pendaftaran usaha. Setelah mengisi data usaha, Anda akan menerima konfirmasi melalui email.'
            ],
            [
                'question' => 'Dokumen apa yang diperlukan untuk pendaftaran?',
                'answer' => 'Anda perlu menyediakan salinan identitas usaha (NIB) dan bukti alamat usaha. Dokumen ini dapat diunggah selama proses pendaftaran.'
            ],
            [
                'question' => 'Apakah ada biaya untuk mendaftar UMKM?',
                'answer' => 'Tidak, proses pendaftaran UMKM dalam sistem ini sepenuhnya gratis.'
            ],
            [
                'question' => 'Bagaimana cara memperbarui informasi usaha saya?',
                'answer' => 'Setelah masuk, Anda dapat memperbarui detail usaha dengan mengakses bagian \'Usaha Saya\' dan mengedit kolom yang diperlukan. Pembaruan akan langsung terlihat.'
            ],
        ]);
    }

}
