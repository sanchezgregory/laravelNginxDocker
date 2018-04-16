<?php

namespace App\Http\Middleware;

use App\AccessHandler;
use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param                           $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        if (! AccessHandler::check($user->role->name, $role)) {

            return redirect()->route('home')->with('alert', 'Privilegios de usuario insuficientes');
            // return abort(404);
        }

        return $next($request);
    }
}
