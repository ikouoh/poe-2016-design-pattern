<?php

namespace DesignPatterns\Router;

use Interop\Container\ContainerInterface;
use DesignPatterns\Router\Cache\CacheInterface;

class Router
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * Router constructor.
     * @param array $config
     * @param ContainerInterface $container
     */
    public function __construct(
        array $config,
        ContainerInterface $container,
        CacheInterface $cache = null
    ) {
        $this->config = $config;
        $this->container = $container;
        $this->cache = $cache;
    }

    public function route()
    {
        $getRoute = (!empty($_GET['route'])) ? $_GET['route'] : 'home';
        $controllerId = false;

        if ($this->cache instanceof CacheInterface) {
            $controllerId = $this->cache->read($getRoute);
        }

        if (!$controllerId && !empty($this->config[$getRoute])) {
            $controllerId = $this->config[$getRoute];
            if ($this->cache instanceof CacheInterface) {
                $this->cache->add($getRoute, $controllerId);
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            echo 'Route does not exist.';
            exit();
        }

        $controller = $this->container->get($controllerId);
        echo $controller->indexAction();
        exit();
    }
}
