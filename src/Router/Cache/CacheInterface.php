<?php

namespace DesignPatterns\Router\Cache;

interface CacheInterface
{
    public function add($key, $value);
    public function read($key);
}
