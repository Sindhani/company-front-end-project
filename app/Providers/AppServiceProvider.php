<?php

namespace App\Providers;

use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Nette\Schema\Schema;


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
        \Illuminate\Support\Facades\Schema::defaultStringLength(192);


        View::composer('welcome', function ($view){
          $view->with('packages', Package::with('description')->get());
        });

        Gate::define('manage-packages', function ($user){
            if(auth()->check() && auth()->user()->is_admin){
                return true;
            }
        });
    }
}
