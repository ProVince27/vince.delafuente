<?php

return [
    [
        'title'       => 'Dashboard',
        'route'       => '#',
        'icon'        => 'fa fa-calendar',
        'role'        => ['admin'],
        'permissions' => ['can_view_dashboard'],
        'items' => [
            'title' => 'Dashboard one',
            'route' => [
                'name' => 'dashboard',
                'params' => [
                    'type' => 'example'
                ]
            ]
        ]
    ],
    [
        'title'       => 'Dashboard 2',
        'route'       => '#',
        'icon'        => 'fa fa-calendar',
        'role'        => ['admin'],
        'permissions' => ['can_view_dashboard'],
        'items' => [
            'title' => 'Dashboard one',
            'route' => [
                'name' => 'dashboard',
                'params' => [
                    'type' => 'example'
                ]
            ]
        ]
    ],
];