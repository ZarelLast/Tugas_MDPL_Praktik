<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->user()->email == "admin@gmail.com"){
            return $next($request);
        }
        return redirect()->route('home');
    }
}
