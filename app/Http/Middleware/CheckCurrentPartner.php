<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Project;

class CheckCurrentPartner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $project = Project::find($request->route('id'));
        if (Auth::user()->id == $project->partner->user->id ) {
            return $next($request);
        }

       return redirect()->intended(RouteServiceProvider::HOME);
    }
}
