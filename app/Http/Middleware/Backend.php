<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Backend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        config()->set('auth.defaults.guard', 'admin');
        config()->set('auth.defaults.passwords', 'admins');
        return $next($request);
    }
}
