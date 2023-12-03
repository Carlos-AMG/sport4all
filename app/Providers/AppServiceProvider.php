<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            if (auth()->check() && auth()->user()->role == 'user') {
                $Items = Cart::all()->where('user_id', auth()->id()); // Ajusta según la estructura de tu modelo
                // dd($Items);
                $cantItems = 0;
                foreach($Items as $item){
                    $cantItems += $item->quantity;
                }
                // dd($cantItems);
                $view->with('cantItems', $cantItems);
            }
        });
    }
}
