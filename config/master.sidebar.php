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
        'title'       => 'Access Control',
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
    [
        'class'       => MasterSidebar::class,
        'title'       => 'Dev',
        'route'       => '#',
        'icon'        => 'fab fa-dev',
        'items'       => [
            [
                'class' => MasterSidebar::class,
                'title' => 'Maps',
                'icon'  => 'fas fa-map-marked-alt',
                'route' => 'dev.google-map',
            ],
            [
                'class' => MasterSidebar::class,
                'title' => 'Media',
                'icon'  => 'fas fa-photo-video',
                'route' => 'dev.media-manager',
            ]
        ],
    ],
    [
        'class'       => MasterSidebar::class,
        'title'       => 'Navigations',
        'route'       => '#',
        'icon'        => 'fas fa-compass',
        'items'       => [
            [
                'class' => MasterSidebar::class,
                'title' => 'Sidebar Menu',
                'icon'  => 'fab fa-elementor',
                'route' => 'dev.google-map',
            ],
            [
                'class' => MasterSidebar::class,
                'title' => 'Menu',
                'icon'  => 'far fa-caret-square-down',
                'route' => 'dev.media-manager',
            ]
        ],
    ],

];