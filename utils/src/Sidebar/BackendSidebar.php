<?php

namespace Icg\Sidebar;

use Illuminate\Contracts\Container\Container;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Sidebar;
use Maatwebsite\Sidebar\Traits\CacheableTrait;
use Auth;

class BackendSidebar implements Sidebar {

    // use CacheableTrait;
    protected $menu;
    public $container;
    protected $user;

    public function __construct(Menu $menu, Container $container) {
        $this->menu      = $menu;
        $this->container = $container;
        $this->user = Auth::User();
    }

    public function build() {
        $sidebars = $this->sidebarTeamRole();
        /**
         * @todo sort the array before generations
         */
        try {
            foreach ($sidebars as $sort => $sidebar) {
                if (class_exists($sidebar["class"])) {
                    $extender        = $this->container->make($sidebar["class"]);
                    $extender->order = $sort;
                    $extender->container = (object) $sidebar;
                    
                    $this->menu->add(
                        $extender->extendWith($this->menu)
                    );
                }
            }
        } catch (Exception $e) {
            throw new \Exception("Invalid Format", 1);
        }
    }


    /**
     * [sidebarTeamRole get sidemenu base on the user]
     * @return [type] [description]
     */
    private function sidebarTeamRole() {
        // fetch all permissions
        // $permissions = array_map(function($permission) {
        //  return $permission["name"];
        // }, $this->user->getBaseRole()->permissions()->get()->toArray());

        // $sidebar = [];
        // $menu = config("spt.sidebar");
        // return $this->filterMenuByPermissions($menu, $permissions);
        return config('sidebar.pages');
    }

    private function filterMenuByPermissions($menu, $permissions) {
        $filtered_menu = [];

        foreach ($menu as $key => $menu_item) {
            if (array_key_exists("permissions", $menu_item)) {
                $menu_permissions = $menu_item["permissions"];
                if (count(array_intersect($permissions, $menu_permissions)) == 0) {
                    continue;
                }
            }

            if (array_key_exists("items", $menu_item)) {
                $sub_items = $this->filterMenuByPermissions($menu_item["items"], $permissions);
                if (count($sub_items) == 0) {
                    continue;
                }
                $menu_item["items"] = $sub_items;
            }

            $filtered_menu[$key] = $menu_item;
        }

        return $filtered_menu;
    }

    public function getMenu() {
        
        return $this->menu;
    }
}
