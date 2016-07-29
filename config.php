<?php

return [
    'services' => [
        'HomeController' => \DesignPatterns\Controller\HomeController::class,
        'HowAreYouDecorator' => \DesignPatterns\Controller\Decorator\Factory\HowAreYouDecoratorFactory::class,
    ],
    'routes' => [
        'home' => 'HowAreYouDecorator',
    ],
];
