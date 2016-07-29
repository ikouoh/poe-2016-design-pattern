<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 28/07/16
 * Time: 16:13
 */

namespace DesignPatterns\Container\Exception;

use Exception;
use Interop\Container\Exception\NotFoundException as InteropNotFoundException;

class NotFoundException extends Exception implements InteropNotFoundException
{

}
