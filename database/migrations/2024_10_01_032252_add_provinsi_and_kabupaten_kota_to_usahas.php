<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('usahas', function (Blueprint $table) {
            // Menambahkan field provinsi_id setelah field 'alamat'
            $table->foreignId('provinsi_id')->constrained('provinsis')->onDelete('cascade')->after('kordinat_usaha');
            
            // Menambahkan field kabupaten_kota_id setelah field 'provinsi_id'
            $table->foreignId('kabupaten_kota_id')->constrained('kabupaten_kotas')->onDelete('cascade')->after('provinsi_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usahas', function (Blueprint $table) {
            $table->dropForeign(['provinsi_id']);
            $table->dropForeign(['kabupaten_kota_id']);
            $table->dropColumn(['provinsi_id', 'kabupaten_kota_id']);
        });
    }
};
