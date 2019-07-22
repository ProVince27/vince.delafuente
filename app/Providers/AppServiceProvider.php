<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        \Schema::defaultStringLength(191);
        if($this->app->environment() === 'production') {
            $this->app['request']->server->set('HTTPS','on');
        }
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
        Blade::component('shared.views.template.template', 'template');
    }
}
