<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 28/07/16
 * Time: 15:34
 */

namespace DesignPatterns\Container;

use DesignPatterns\Container\Exception\NotFoundException;
use Interop\Container\ContainerInterface;

class Container implements ContainerInterface
{

    private $services;

    /**
     * Container constructor.
     * @param $services
     */
    public function __construct(array $services = [])
    {
        $this->services = $services;
    }

    /**
     * @param $service
     * @return mixed
     */
    public function get($id)
    {
        if (empty($this->has($id))) {
            throw new NotFoundException(sprintf("Le service demandé %s n'est pas disponible.", $id));
        } elseif (!is_object($this->services[$id]) && !class_exists($this->services[$id])) {
            throw new NotFoundException(sprintf("La classe %s demandée n'existe pas.", $this->services[$id]));
        }

        if (!is_object($this->services[$id])) {
            $factoryOrService = new $this->services[$id];

            $this->services[$id] = ($factoryOrService instanceof FactoryInterface)
                ? $factoryOrService->createService($this)
                : $factoryOrService;
        }
        return $this->services[$id];
    }

    /**
     * @param $service
     * @return bool
     */
    public function has($id)
    {

        return isset($this->services[$id]);
    }

    /**
     * @param string $service
     * @param string $key
     */
    public function add($service, $key)
    {
        $this->services[$key] = $service;
    }
}
