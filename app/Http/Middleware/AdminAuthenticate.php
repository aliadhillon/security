<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $gaurd = null)
    {
        if (! Auth::guard($gaurd)->check()) {
            if ($gaurd == 'admin') {
                return redirect()->route('admin.login');
            }
        }
        return $next($request);
    }
}
