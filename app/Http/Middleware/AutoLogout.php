<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            $inactiveTimeLimit = 900; // 15 menit

            if ($lastActivity && (Carbon::now()->diffInSeconds($lastActivity) > $inactiveTimeLimit)) {
                Log::info('User logged out due to inactivity.', ['user_id' => Auth::user()->id]);
                Auth::logout();
                $request->session()->invalidate(); // Tambahkan ini
                $request->session()->regenerateToken(); // Tambahkan ini
                return redirect('/login')->with('message', 'You have been logged out due to inactivity.');
            }

            session(['lastActivityTime' => Carbon::now()]);
        }


        return $next($request);
    }
}
