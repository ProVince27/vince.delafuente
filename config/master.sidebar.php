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
        'class'  => MasterSidebar::class,
        'header' => 'Content Mangement',
        'title'  => 'Page Builder',
        'route'  => 'page.cms.page-builder',
        'icon'   => 'fas fa-pen-square',
    ],
    [
        'class'       => MasterSidebar::class,
        'header'      => 'Tools',
        'title'       => 'Access Control',
        'route'       => '#',
        'icon'        => 'fas fa-user-lock',
        'role'        => ['admin'],
        'permissions' => ['can_view_dashboard'],
        'items'       => [
            [
                'class' => MasterSidebar::class,
                'title' => 'Roles',
                'icon'  => 'fas fa-user-tie',
                'route' => 'role.index',
            ],
            [
                'class' => MasterSidebar::class,
                'title' => 'Permissions',
                'icon'  => 'fas fa-user-cog',
                'route' => 'permission.index',
            ],
        ],
    ],
    [
        'class' => MasterSidebar::class,
        'title' => 'Dev',
        'route' => '#',
        'icon'  => 'fab fa-dev',
        'items' => [
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
            ],
        ],
    ],
    [
        'class' => MasterSidebar::class,
        'title' => 'Navigation',
        'route' => '#',
        'icon'  => 'fas fa-compass',
        'items' => [
            [
                'class' => MasterSidebar::class,
                'title' => 'Sidebar',
                'icon'  => 'fab fa-elementor',
                'route' => 'sidebar.index',
            ],
            [
                'class' => MasterSidebar::class,
                'title' => 'Menu',
                'icon'  => 'far fa-caret-square-down',
                'route' => 'menu.index',
            ],
        ],
    ],

];