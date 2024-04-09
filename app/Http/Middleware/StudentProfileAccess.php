<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Student;

class StudentProfileAccess
{
    /**
     * Handle an incoming request.

     *Checks if either of the following conditions is true:
        *The authenticated user's ID matches the ID from the route parameters.
        *The authenticated user's user type is "Teacher."
     *If either condition is true, it allows the request to continue to the next middleware or controller in the pipeline.

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->id == $request->route('id') || Auth::user()->user_type == "Teacher") {
            return $next($request);
        }

       return redirect()->intended(RouteServiceProvider::HOME);
    }
}
