<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InjectPublicViewParams
{
    public function handle(Request $request, \Closure $next)
    {
        View::share('key', 'value');
        return $next($request);
    }
}
