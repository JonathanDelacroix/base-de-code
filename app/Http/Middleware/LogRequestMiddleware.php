<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');

        Log::info('Client browser:', [
            'user_agent' => $userAgent,
        ]);

        return $next($request);
    }
}