<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckApiToken
{
    public function handle($request, Closure $next)
    {
        if (!session('token')) {
            return redirect()->route('mitra.login')
                ->withErrors('Autentikasi diperlukan. Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}