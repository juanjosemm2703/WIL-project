<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     *Allow access to the requested resource if the authenticated user's type is included in the array of allowed user types.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedUserTypes): Response
    {
        if (Auth::user() &&  in_array(Auth::user()->user_type, $allowedUserTypes)) {
            return $next($request);
        }

       return redirect()->intended(RouteServiceProvider::HOME);
    }
}
