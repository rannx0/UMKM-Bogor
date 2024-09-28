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
        Schema::create('personal_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_lengkap', 100); // assuming a reasonable maximum length for full name
            $table->string('nik', 16)->unique(); // NIK typically has a fixed length of 16 characters
            $table->string('tempat_lahir', 50); // assuming a reasonable maximum length for birthplace
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nomor_telepon', 15); // assuming a reasonable maximum length for phone number
            $table->foreignId('provinsi_id')->constrained('provinsis')->onDelete('cascade');
            $table->foreignId('kabupaten_kota_id')->constrained('kabupaten_kotas')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade');
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->onDelete('cascade');
            $table->text('alamat', 100); // assuming a reasonable maximum length for address
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
