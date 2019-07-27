<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckIsActive
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
        if (Auth::user()->status == 1) {
            Auth::logout();
            return redirect('/login')->with('warning', 'No tienes permiso para acceder.');
        }

        return $next($request);
    }
}
