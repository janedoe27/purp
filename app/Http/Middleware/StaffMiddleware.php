<?php

namespace App\Http\Middleware;

use Closure;

class StaffMiddleware
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
        if ((Auth::user()->is_admin !== 1) || (Auth::user()->is_staff !== 1)) {
            return redirect('home');
        } 

        return $next($request);
    }
}
