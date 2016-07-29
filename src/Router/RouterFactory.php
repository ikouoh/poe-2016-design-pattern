<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 29/07/16
 * Time: 11:23
 */

namespace DesignPatterns\Router;


use DesignPatterns\Container\FactoryInterface;

class RouterFactory implements FactoryInterface
{

    public function createService(ContainerInterface $container)
    {
        // TODO: Implement createService() method.
        $configuration = $container->get('configuration');
        if(!$configuration->offsetExists('route')) {
        	$configuration->offsetSet('route', array());
        } else {
        	$routeConfig = $configuration->offsetGet('route')->getArrayCopy();
        	return new Router($routeConfig, $container);	
        }
        

    }
}