<?php

namespace DesignPatterns\Controller\Decorator;

use DesignPatterns\Controller\HomeController;
use DesignPatterns\Controller\ControllerInterface;

class HowAreYouDecorator implements ControllerInterface
{

    private $realController;

    public function __construct(ControllerInterface $realController)
    {
        $this->realController = $realController;
    }

    public function indexAction()
    {
        return $this->realController->indexAction() . '<br /> How are you ?';
    }
}
