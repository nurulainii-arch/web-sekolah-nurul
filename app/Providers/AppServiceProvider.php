<?php

namespace App\Providers;

use App\Models\SchoolSetting;
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
        // Kirim $setting otomatis ke semua view yang pakai layout publik,
        // jadi tidak perlu di-pass manual dari tiap controller.
        View::composer('layouts.public', function ($view) {
            $view->with('setting', SchoolSetting::first());
        });
    }
}