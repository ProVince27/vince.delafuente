<?php

namespace Icg\Sidebar;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Sidebar\SidebarManager;

class SidebarServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(SidebarManager $manager) {
        $manager->register(BackendSidebar::class);
        view()->creator("shared.views.sidebar.sidebar-main", SidebarCreator::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
