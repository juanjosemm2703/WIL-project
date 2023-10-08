<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Student;

class CheckCurrentStudent
{
    /**
     * Handle an incoming request.
     
     *Checks if the authenticated user's ID matches the ID from the route parameters. 
     *If true, it allows the request to continue to the next middleware or controller in the pipeline.

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->id == $request->route('id')) {
            return $next($request);
        }

       return redirect()->intended(RouteServiceProvider::HOME);
    }
}
