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
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('show_instagram')->default(false)->after('instagram');
            $table->boolean('show_facebook')->default(false)->after('facebook');
            $table->boolean('show_twitter')->default(false)->after('twitter');
            $table->boolean('show_linkedin')->default(false)->after('linkedin');
            $table->boolean('show_youtube')->default(false)->after('youtube');
            $table->boolean('show_tiktok')->default(false)->after('tiktok');
            $table->boolean('show_telegram')->default(false)->after('telegram');
            $table->boolean('show_discord')->default(false)->after('discord');
            $table->boolean('show_github')->default(false)->after('github');
            $table->boolean('show_medium')->default(false)->after('medium');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'show_instagram', 'show_facebook', 'show_twitter', 'show_linkedin', 
                'show_youtube', 'show_tiktok', 'show_telegram', 'show_discord', 
                'show_github', 'show_medium'
            ]);
        });
    }

};
