<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\debitAir;
use App\data_debit_air;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        data_debit_air::observe(debitAir::class);
    }
}
