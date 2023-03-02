<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use App\Exceptions\CustomException;
use App\Exceptions\UnauthenticatedException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ApiResponser;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        throw new CustomException(__('message.unauthenticated'));
    }

}
