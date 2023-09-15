<?php

return [
    'name' => 'Liv Ezy',
    'manifest' => [
        'name' => 'Liv Ezy',
        'short_name' => 'Liv Ezy',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'portrait',
        'status_bar'=> 'black',
        "scope"=> "/",
        'icons' => [
            '72x72' => [
                'path' => 'fitness/mobile/icon_splash/72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => 'fitness/mobile/icon_splash/96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => 'fitness/mobile/icon_splash/128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => 'fitness/mobile/icon_splash/144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => 'fitness/mobile/icon_splash/144x144.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => 'fitness/mobile/icon_splash/144x144.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => 'fitness/mobile/icon_splash/144x144.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => 'fitness/mobile/icon_splash/144x144.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => 'fitness/images/splash-screen.gif',
            '750x1334' => 'fitness/images/splash-screen.gif',
            '828x1792' => 'fitness/images/splash-screen.gif',
            '1125x2436' => 'fitness/images/splash-screen.gif',
            '1242x2208' => 'fitness/images/splash-screen.gif',
            '1242x2688' => 'fitness/images/splash-screen.gif',
            '1536x2048' => 'fitness/images/splash-screen.gif',
            '1668x2224' => 'fitness/images/splash-screen.gif',
            '1668x2388' => 'fitness/images/splash-screen.gif',
            '2048x2732' => 'fitness/images/splash-screen.gif',
        ],
        'shortcuts' => [
            [
                'name' => 'Liv Ezy',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/mobile',
                'icons' => [
                    "src" => "/fitness/mobile/icon_splash/144x144.png",
                    "purpose" => "any"
                ]
            ]
        ],
        'custom' => []
    ]
];
