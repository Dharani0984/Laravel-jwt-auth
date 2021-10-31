<?php

namespace App\Http\Middleware;

use Closure;

class EmpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $emp)
    {
        echo "Emp : ".$emp;
        return $next($request);
    }
}
