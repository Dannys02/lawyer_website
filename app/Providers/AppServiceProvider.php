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
            static $whatsappUrl = false;

            if ($aboutData === false) {
                $aboutData = Schema::hasTable('abouts') ? about::latest()->first() : null;
            }
            if ($socialMediaData === false) {
                $socialMediaData = Schema::hasTable('socialmedia') ? socialmedia::latest()->first() : null;
            }
            if ($whatsappUrl === false) {
                $templateText = "Terima kasih telah menghubungi Kantor Hukum Nurul Safii, S.H., M.H., C.MSP. Pesan Anda telah kami terima. Untuk memudahkan proses konsultasi, silakan kirimkan:\n\n1. Nama lengkap:\n2. Jenis perkara (Perdata / Pidana / Keluarga / Bisnis / dll.):\n3. Kronologi singkat permasalahan:\n\nKami akan segera merespons pesan Anda. Terima kasih atas kepercayaan Anda.";
                $encodedText = rawurlencode($templateText);

                $rawWa = trim($socialMediaData->wa ?? '');
                $phone = '6285331979610';

                if (!empty($rawWa)) {
                    $digitsOnly = preg_replace('/\D/', '', $rawWa);
                    if (str_starts_with($rawWa, '+') || is_numeric($rawWa) || preg_match('/^\+?\d{8,16}$/', $rawWa)) {
                        if (str_starts_with($digitsOnly, '0')) {
                            $digitsOnly = '62' . substr($digitsOnly, 1);
                        }
                        $phone = $digitsOnly;
                    } elseif (preg_match('/wa\.me\/(\d+)/', $rawWa, $matches)) {
                        $phone = $matches[1];
                    }
                }

                $whatsappUrl = "https://wa.me/{$phone}?text={$encodedText}";
            }

            $view->with([
                'aboutData' => $aboutData,
                'socialMediaData' => $socialMediaData,
                'whatsappUrl' => $whatsappUrl,
            ]);
        });
    }
}
