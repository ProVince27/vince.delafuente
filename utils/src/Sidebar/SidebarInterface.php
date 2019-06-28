<?php

namespace Icg\Sidebar;

interface SidebarInterface {

    public static function isEnabled();

    public function subItems($menu, $builder, $key);
}
