<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Configuration;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Mengambil konfigurasi untuk ditampilkan di seluruh view
        $configuration = Configuration::find(1) ?? new Configuration;

        // Membagikan data konfigurasi ke semua view
        View::share('configuration', $configuration);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
