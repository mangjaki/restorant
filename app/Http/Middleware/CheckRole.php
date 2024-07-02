<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user() && auth()->user()->role == $role) {
            return $next($request);
        }
        return redirect('/')->with('error', 'You do not have access to this page');
    }
    
}
