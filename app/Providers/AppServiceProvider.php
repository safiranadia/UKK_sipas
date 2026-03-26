<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer('admin.layouts.index', function ($view) {
            if (auth()->check() && auth()->user()->role === 'admin') {
                $unreadReports = \App\Models\ReportFacilities::with('user')
                    ->where('is_read_admin', false)
                    ->latest()
                    ->get();
                $view->with('unreadReports', $unreadReports);
            }
        });
    }
}
