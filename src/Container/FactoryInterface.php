<?php

namespace DesignPatterns\Container;

use Interop\Container\ContainerInterface;

interface FactoryInterface
{
    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @return mixed
     */
    public function createService(ContainerInterface $container);
}
