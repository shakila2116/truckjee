<?php

namespace TruckJee\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TransporterMiddleware
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
        if(Auth::check() && auth()->user()->role != 2)
        {
            return response("Unauthorized to perform this transporter action");
        }
        return $next($request);
    }
}
