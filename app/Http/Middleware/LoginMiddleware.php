<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check() && $request->route()->getName() != 'login.index')
            return redirect()->route('login.index');

        if(Auth::check() && $request->route()->getName() == 'login.index')
            return redirect()->route('logado.index');

        

        return $next($request);
    }
}
