<?php

namespace App\Providers;

use Illuminate\Support\Collection;
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
        
        Collection::macro('whereLike', function ($key,$value) {
            return $this->filter(function ($item) use ($key,$value) {
                if(stripos(data_get($item,$key), $value) !== false){
                    return $item;
                }
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
