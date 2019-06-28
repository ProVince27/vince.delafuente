<?php

namespace Icg\Sidebar;

use Exception;
use Maatwebsite\Sidebar\Item;

/**
 * @todo Add badge for the
 * @todo A dedicated class for the badge since this will be set the
 * numeric number of the side menu
 */

trait SidebarTrait {

    /**
     * [subItems generator]
     * @param  [type]  $menu    [menu detail]
     * @param  [type]  $builder [instance of Maatwebsite\Sidebar\Item]
     * @param  integer $key     [ordering of the menu]
     * @return [type]  [void]
     */
    public function subItems($menu, $builder, $key = 0) {
        if ($items = hasItemKey($menu)) {
            foreach ($items as $order => $child) {
                if (!is_array($child)) {
                    throw new Exception("Invalid format {$child}", 1);
                }
                $builder->item($child["title"], function ($builder) use ($child, $order) {
                    $childObject = (object) $child;
                    $builder->weight($order);
                    $builder->icon($this->icons($child));
                    $this->uri($builder, $child);
                    $this->subItems($childObject, $builder, $order);
                });
            }
        }
    }

    /**
     * [icons extra the icon]
     * @param  [array|object] $icon []
     * @return [string]       [icon ]
     */
    public function icons($item) {
        //
        return keyExtractor($item, "icon") ?: "fa fa-circle-o";
    }

    /**
     * [Make a uri]
     * @param  [type] $builder [Maatwebsite\Sidebar\Item]
     * @param  [type] $item    [array]
     * @return [object]          [Maatwebsite\Sidebar\Item]
     */
    public function uri($builder, $item) {
        $uri = $this->uriExtractor($item);
        if (isset($uri) && is_string($uri) && $uri != "#") {
            return $builder->route($uri);
        }
        if (is_array($uri)) {
            return $this->uriCreate($builder, $uri);
        }
        /*if the side bar contain the explicit url */
        return $builder->url($uri);
    }

    /**
     * [uriExtractor]
     * @param  [type] $item [array]
     * @return [type]       [string]
     */
    public function uriExtractor($item) {
        return keyExtractor($item, "route") ?: null;
    }

    /**
     * [uriCreate description]
     * @param  [type] $builder [instance of Maatwebsite\Sidebar\Item]
     * @param  [type] $uri     [array]
     * @return [object]        [Maatwebsite\Sidebar\Item]
     */
    public function uriCreate($builder, $uri) {
        if (array_key_exists("name", $uri)) {
            return $builder->route($uri["name"], $uri['params'] ?: "");
        }
    }

    public function groupHeader($group) {
        $group->hideHeading($this->hasGroupHeader());
    }

    /*return fals*/
    public function hasGroupHeader() {
        return !property_exists($this->container, "header");
    }

    public function groupName() {
        return $this->hasGroupHeader() ? $this->container->title : $this->container->header;
    }
}
