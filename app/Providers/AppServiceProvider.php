<?php

namespace App\Providers;

use App\Repositories\MessagesInterface;
use App\Repositories\CacheMessages;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(
            MessagesInterface::class,
            CacheMessages::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if($this->app->environment('local'))
        // {
        //     $this->app->register(\Modelizer\Selenium\SeleniumServiceProvider::class);
        // }
    }
}
