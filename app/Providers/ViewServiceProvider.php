<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Configuration;
use App\Models\HeroContent;
use App\Models\AboutUs;
use App\Models\Faq;

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
        View::composer('frontend.dashboard', function ($view) {
            $aboutUs = AboutUs::first();
            $faqs = Faq::take(4)->get();
            $heroContent = HeroContent::first();
            $view->with([
                'aboutUs' => $aboutUs,
                'heroContent' => $heroContent,
                'faqs' => $faqs,
            ]);
        });
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
