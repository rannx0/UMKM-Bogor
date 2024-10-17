<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->string('umkm_title')->nullable();
            $table->string('umkm_subtitle')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('faq_subtitle')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
        });
    }

    public function down()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn([
                'umkm_title',
                'umkm_subtitle',
                'faq_title',
                'faq_subtitle',
                'contact_title',
                'contact_subtitle'
            ]);
        });
    }

};
