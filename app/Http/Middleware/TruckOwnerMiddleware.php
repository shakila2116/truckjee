<?php

namespace TruckJee\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TruckOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role != 1)
        {
            return response("Unauthorized to perform this truck owner action");
        }
        return $next($request);
    }
}
