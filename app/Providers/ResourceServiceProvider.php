<?php

namespace App\Providers;

// use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ResourceServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Blade::component('shared.views.template.vue-x-template.blade', 'template');
        Blade::directive('datetime', function ($format = "Y-m-d") {
            return now()->format($format);
        });
    }
}
