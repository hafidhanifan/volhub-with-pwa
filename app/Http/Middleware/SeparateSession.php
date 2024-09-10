<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SeparateSession
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard && Auth::guard($guard)->check()) {
            $cookieName = Str::slug(config('app.name'), '_') . '_' . $guard . '_session';
            config(['session.cookie' => $cookieName]);
        }

        return $next($request);
    }
}

