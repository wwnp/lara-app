<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevToken
{
    public function handle(Request $request, Closure $next)
    {
        // dd($request->cookie("devtoken"));
        // if ($request->cookie('devtoken') !== '123') {
        //     abort(500);
        // }
        // ...
        return $next($request);
    }
}
