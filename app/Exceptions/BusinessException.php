<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class BusinessException extends Exception
{
    public function __construct($message = "", $code = 0)
    {

    }
}
