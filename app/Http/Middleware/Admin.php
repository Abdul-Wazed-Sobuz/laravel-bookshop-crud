<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        return $next($request);

        if (session()->has('email'))
            return $next($request);
        session()->flash('msg', "You need to login");
        return redirect()->route('login');
    }
}
