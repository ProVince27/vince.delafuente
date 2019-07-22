<?php

namespace Icg\Providers;

use Carbon\Carbon;
use Icg\Database\MySqlConnection;
use Icg\Console\Commands\CreateView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Icg\Console\Commands\GitPushNewRelease;

class IcgServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
        $this->app->bind('db.connection.mysql', MySqlConnection::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        Blade::component('shared.views.template.template', 'template');
        Blade::directive('datetime', function ($format = "Y-m-d") {
            return Carbon::now()->format($format);
        });
        $this->baseQuery();
        $this->baseCommand();
    }

    private function baseQuery() {
        Builder::macro('searchBy', function ($args, $term) {
            $this->where(function (Builder $query) use ($args, $term) {
                foreach (array_wrap($args) as $arg) {
                    $query->orWhere(
                        $arg,
                        'LIKE',
                        is_array($term) ? "%{$term[$arg]}%" : "%{$term}%"
                    );
                }
            });
            return $this;
        });
    }

    private function baseCommand() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GitPushNewRelease::class
            ]);
        }
    }

}
