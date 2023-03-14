<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()==null){
            return redirect()->route('login');
        }
        if ($request->user()->role!='super_admin'){
            return redirect()->back()->with('noRole','You can not access this!');
        }
        return $next($request);
    }
}
