<?php

namespace DesignPatterns\Application;

use ArrayObject;
use DesignPatterns\Container\Container;
use DesignPatterns\Router\RouterFactory;

class Application
{
    /**
     * @var array
     */
    private $configuration = [];
    
    /**
     * @var DesignPatterns\Container\Container
     */
    private $container;

    public function __construct($configuration = [])
    {
        $this->configuration = $configuration;
        return $this;
    }

    public function init()
    {
        if (empty($this->configuration['services'])) {
            $this->configuration['services'] = [];
        }
        $this->container = new Container($this->configuration['services']);
        $this->container->add(
            new ArrayObject($this->configuration),
            'configuration'
        );
        $this->container->add(
            RouterFactory::class,
            'router'
        );
        return $this;
    }

    public function run()
    {
        $router = $this->container->get('router');
        $router->route();
    }
}
