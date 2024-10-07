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
        Schema::table('keuangans', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['usaha_id']);

            // Tambahkan foreign key baru dengan ON DELETE CASCADE
            $table->foreign('usaha_id')
                    ->references('id')
                    ->on('usahas')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keuangans', function (Blueprint $table) {
            //
        });
    }
};
