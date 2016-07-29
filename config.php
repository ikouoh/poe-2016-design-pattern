<?php

return [
    'services' => [
        'HomeController' => \DesignPatterns\Controller\HomeController::class,
        'HowAreYouDecorator' => \DesignPatterns\Controller\Decorator\Factory\HowAreYouDecoratorFactory::class,
        'Cache' => \DesignPatterns\Cache\ArrayCache::class,
    ],
    'routes' => [
        'home' => 'HowAreYouDecorator',
    ],
];
