<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevToken
{
    public function handle(Request $request, Closure $next)
    {
        $request->cookie("devtoken", "qweqwe", 60);
        dd($request->cookie("devtoken"));
        // ...
        return $next($request);
    }
}
