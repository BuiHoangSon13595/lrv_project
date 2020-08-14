<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;
use App\Models\Favorite;
use App\Models\Banner;
use Auth;

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
        view()->composer('*',function($view){
            $view->with([
                'cart' => new CartHelper(),
                'banners_bot' => Banner::where('position','bot')->get(),
                'like' =>  Auth::guard('client')->user() ? Favorite::where('client_id', Auth::guard('client')->user()->id)->count() : 0,
            ]);
        });
    }
}
