<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;

class CustomException extends Exception
{
    use ApiResponser;
 
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return $this->failed([], $this->message);
    }
}
