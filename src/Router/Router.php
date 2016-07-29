<?php

namespace DesignPatterns\Router;

use Interop\Container\ContainerInterface;

class Router
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @var ContainerInterface
     */
    private $containerInterface;

    /**
     * Router constructor.
     * @param array $config
     * @param ContainerInterface $containerInterface
     */
    public function __construct(array $config = [], ContainerInterface $containerInterface)
    {
        $this->config = $config;
        $this->containerInterface = $containerInterface;
    }
}
