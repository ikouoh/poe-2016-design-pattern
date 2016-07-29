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
    private $container;

    /**
     * Router constructor.
     * @param array $config
     * @param ContainerInterface $container
     */
    public function __construct(array $config, ContainerInterface $container)
    {
        $this->config = $config;
        $this->container = $container;
    }

    public function route()
    {
        $getRoute = (!empty($_GET['route'])) ? $_GET['route'] : 'home';

        if (!empty($this->config[$getRoute])) {
            $controller = $this->container->get($this->config[$getRoute]);
            echo $controller->indexAction();
            exit();
        } else {
            header("HTTP/1.0 404 Not Found");
            echo 'Route does not exist.';
            exit();
        }
    }
}
