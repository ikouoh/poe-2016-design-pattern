<?php

namespace DesignPatterns\Controller\Decorator\Factory;

use DesignPatterns\Container\FactoryInterface;
use Interop\Container\ContainerInterface;
use DesignPatterns\Controller\Decorator\HowAreYouDecorator;

class HowAreYouDecoratorFactory implements FactoryInterface
{
    public function createService(ContainerInterface $container)
    {
        $homeController = $container->get('HomeController');
        return new HowAreYouDecorator($homeController);
    }
}
