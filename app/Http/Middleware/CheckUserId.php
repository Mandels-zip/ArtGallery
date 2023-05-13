<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\support\Facades\Auth;
use App\Models\User;

class CheckUserId
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
        
        $authUser = Auth::User();

        if (!$authUser){
        abort(403, 'Unauthorized action.');
        } else {
        $requestedUser = User::where('nickname', $request->nickname)->first();

        if (!$requestedUser) {
            abort(404, 'User not found.');
        }

        if ($authUser->id !== $requestedUser->id && !in_array($authUser->role, ['admin', 'moderator'])) {
            abort(403, 'Unauthorized action.');
        }
    }

        return $next($request);
    }
    }

