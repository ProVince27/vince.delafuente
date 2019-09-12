<?php

namespace App\Providers;

use Icg\Database\SchemaMacro;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        if ($this->app->environment() === 'production') {
            $this->app['request']->server->set('HTTPS', 'on');
        }

        Collection::macro('whereLike', function ($key, $value) {
            return $this->filter(function ($item) use ($key, $value) {
                if (stripos(data_get($item, $key), $value) !== false) {
                    return $item;
                }
            });
        });
        
        Resource::withoutWrapping();

        if(\in_console()){
          $this->onConsole();
        }
    }

    private function onConsole(){
        \Schema::defaultStringLength(191);
        SchemaMacro::modifiers();
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
