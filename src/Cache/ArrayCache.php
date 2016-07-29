<?php

namespace DesignPatterns\Cache;

class ArrayCache implements ArrayCacheInterface
{

    private $cached = [];

    public function set($key, $value)
    {
        $cached[$key] = $value;
    }

    public function get($key)
    {
        return !empty($cached[$key]) ? $cached[$key] : false;
    }
}
