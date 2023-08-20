<?php

namespace App\Providers;

use App\Models\Advert;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\System;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    

    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $system = System::first();
       
        view()->share('system', $system);
    }
}
