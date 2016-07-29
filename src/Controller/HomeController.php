<?php

namespace DesignPatterns\Controller;

class HomeController implements ControllerInterface
{

    public function indexAction()
    {
        return 'Hello World !';
    }
}
