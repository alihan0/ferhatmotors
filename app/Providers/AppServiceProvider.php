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
        if (app()->environment('local') && !\App::runningInConsole()) {
            try {
                // Veritabanını kontrol eden işlem
                \DB::connection()->getPdo();
                $system = System::first();
                view()->share('system', $system);
            } catch (\Exception $e) {
                // Veritabanı hala oluşturulmamış
            }
        }

        \Blade::directive('money', function ($expression) {
            return "<?php echo format_money($expression); ?>";
        });
    }
}
