<?php

namespace App\Providers;

use App\Models\about;
use App\Models\socialmedia;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('interface.*', function ($view) {
            static $aboutData = false;
            static $socialMediaData = false;

            if ($aboutData === false) {
                $aboutData = Schema::hasTable('abouts') ? about::latest()->first() : null;
            }
            if ($socialMediaData === false) {
                $socialMediaData = Schema::hasTable('socialmedia') ? socialmedia::latest()->first() : null;
            }

            $view->with([
                'aboutData' => $aboutData,
                'socialMediaData' => $socialMediaData,
            ]);
        });
    }
}
