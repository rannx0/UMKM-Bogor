<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Configuration;
use App\Models\HeroContent;
use App\Models\AboutUs;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

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

        // Membagikan profil pengguna yang sedang masuk ke semua view
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $profile = $user->profile;
                // Jika profil tidak ada, buat profil kosong
                if (!$profile) {
                    $profile = Profile::create(['user_id' => $user->id]);
                }
                $view->with('profile', $profile);
            }
        });

        // Komposisi untuk view tertentu
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
