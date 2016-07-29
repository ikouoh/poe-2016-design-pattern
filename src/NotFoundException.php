<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 28/07/16
 * Time: 16:13
 */

namespace Exception\NotFoundException;


use Exception;
use Interop\Container\Exception\NotFoundException as NFE;


class NotFoundException extends Exception implements NFE
{

}