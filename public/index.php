<?php

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$app = new \DesignPatterns\Application\Application(require 'config.php');

$app->init()->run();
