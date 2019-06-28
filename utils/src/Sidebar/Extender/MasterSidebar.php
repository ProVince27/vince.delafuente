<?php

namespace Icg\Sidebar\Extender;

use Icg\Sidebar\SidebarInterface;
use Icg\Sidebar\SidebarTrait;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\SidebarExtender;

/*Master Sidebar */
class MasterSidebar implements SidebarInterface, SidebarExtender {

    use SidebarTrait;

    public $enabled = false;

    public $container;

    public $order;

    public function __construct() {
        $this->enabled = true;
    }

    public function extendWith(Menu $menu) {
        $menu->group($this->groupName(), function (Group $group) {
            $group->weight($this->order);
            $group->hideHeading();
            $this->groupHeader($group);
            $group->item($this->container->title, function (Item $item) {
                $item->icon($this->container->icon);
                $this->uri($item, $this->container);
                /*
                 * this will recursively generate the submenus
                 * base on array configuration
                 */
                $this->subItems($this->container, $item);
            });
        });
        return $menu;
    }

    public static function isEnabled() {
        return (new static )->enabled;
    }
}
