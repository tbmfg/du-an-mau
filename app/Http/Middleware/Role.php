<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('signin');

        $user = Auth::user();

        if ($user->isAdmin())
            return $next($request, $user);

        foreach ($roles as $role) {
            if ($user->hasRole($role))
                return $next($request, $user);
        }

        return abort('403');
    }
}
