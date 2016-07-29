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
            $config->offsetSet('routes', []);
        }
        $conf = $config->offsetGet('routes')->getArrayCopy();

        return new Router($conf, $container);
    }
}
