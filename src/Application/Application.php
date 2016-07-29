<?php

namespace DesignPatterns\Application;

use DesignPatterns\Container\Container;

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

        return $this;
    }

    public function run()
    {
        echo 'run';
    }
}
