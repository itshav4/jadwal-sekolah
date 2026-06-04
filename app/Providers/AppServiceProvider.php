<?php

namespace App\Providers;

use App\Models\Jadwal;
use App\Policies\JadwalPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::policy(Jadwal::class, JadwalPolicy::class);
    }
}
