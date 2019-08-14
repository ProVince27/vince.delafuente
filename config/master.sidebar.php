<?php

use Icg\Sidebar\Extender\MasterSidebar;

return [
    [
        'class'       => MasterSidebar::class,
        'title'       => 'Dashboard',
        'route'       => 'dashboard',
        'icon'        => 'fas fa-tachometer-alt',
        'role'        => ['admin'],
        'permissions' => ['can_view_dashboard'],
    ],
    [
        'class'       => MasterSidebar::class,
        'title'       => 'ACL',
        'route'       => 'parent',
        'icon'        => 'fas fa-user-lock',
        'role'        => ['admin'],
        'permissions' => ['can_view_dashboard'],
        'items'       => [
            [
                'class' => MasterSidebar::class,
                'title' => 'Roles',
                'icon'  => 'fas fa-user-tie',
                'route' => 'child1',
            ],
            [
                'class' => MasterSidebar::class,
                'title' => 'Permissions',
                'icon'  => 'fas fa-user-cog',
                'route' => 'child2',
            ],
        ],
    ],
];