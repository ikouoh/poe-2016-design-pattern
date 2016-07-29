<?php

namespace DesignPatterns\Router;

use DesignPatterns\Container\FactoryInterface;
use Interop\Container\ContainerInterface;

class RouterFactory implements FactoryInterface
{
    public function createService(ContainerInterface $container)
    {
        $config = $container->get('configuration');

        if (!$config->offsetExists('routes')) {
            $config->routes = [];
        }
        
        return new Router($config->routes, $container);
    }
}
