<?php

namespace App\Http\Middleware;

use Closure;

use App\Rol;

use Auth;

class CheckUserRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        $rol = Rol::where('rol', $rol)->firstOrFail();
        if (Auth::user()->rol != $rol->id) {
            return redirect('home')->with('warning', 'You dont have permmissions to go there.');
        }
        return $next($request);
    }
}
