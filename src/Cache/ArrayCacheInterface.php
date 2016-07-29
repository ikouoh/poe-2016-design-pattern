<?php

namespace DesignPatterns\Cache;

interface ArrayCacheInterface
{
    public function set($key, $value);
    public function get($key);
}
