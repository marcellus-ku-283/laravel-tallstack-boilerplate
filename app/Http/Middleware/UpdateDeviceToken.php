<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use App\Models\UserDevice;
use App\services\AuthService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateDeviceToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        (new AuthService(new User()))->updateDeviceToken(auth()->id());
        return $next($request);
    }
}
