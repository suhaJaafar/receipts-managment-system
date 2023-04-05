<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiration
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
    // Check session expiration for the "web" guard
    if (Auth::guard('web')->check()) {
        $lastActivity = session('web_last_activity');
        if ($lastActivity && time() - $lastActivity > config('session.lifetime') * 60) {
            Auth::guard('web')->logout();
            session()->invalidate();
            session()->regenerateToken();
        }
        session(['web_last_activity' => time()]);
    }

    // Check session expiration for the "admin" guard
    if (Auth::guard('admin')->check()) {
        $lastActivity = session('admin_last_activity');
        if ($lastActivity && time() - $lastActivity > config('session.lifetime') * 60) {
            Auth::guard('admin')->logout();
            session()->invalidate();
            session()->regenerateToken();
        }
        session(['admin_last_activity' => time()]);
    }

    return $next($request);
}
}

