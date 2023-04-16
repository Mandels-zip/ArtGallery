<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
       if (Auth::check()) {
        $user =Auth::user();
            foreach ($roles as $role) {
                if($user->role === $role) {
                    return $next($request);
                }
            }
       }elseif(!Auth::check()) {
        return redirect()->route('home');
    }
       abort(403, 'Invalid role');
    }
}
