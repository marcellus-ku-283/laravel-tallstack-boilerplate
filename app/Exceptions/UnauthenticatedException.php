<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;

class UnauthenticatedException extends Exception
{
    use ApiResponser;

    public function render()
    {
        return $this->invalidAccessToken([],__('auth.failed'));
    }

}
