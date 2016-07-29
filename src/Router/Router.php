<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 29/07/16
 * Time: 10:33
 */

namespace DesignPatterns\Router;


use DesignPatterns\Container\Container;

class Router
{
    private $config = [];
    private $container;

    /**
     * Router constructor.
     * @param array $config
     */
    public function __construct(array $config, Container $container)
    {
        $this->config = $config;
        $this->container = $container;
    }

    public function root()
    {
        $route = $_GET['route'];
        if(isset($config[$route])) {
            $service = $this->container->get($route);
            echo $service->indexAction();
            exit;
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }

}