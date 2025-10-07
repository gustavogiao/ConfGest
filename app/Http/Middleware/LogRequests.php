<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequests
{
    public function handle(Request $request, Closure $next): Response
    {

        $start = microtime(true);

        Log::info('New request received', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'payload' => $request->all(),
        ]);

        $response = $next($request);

        $duration = microtime(true) - $start;

        Log::info('Send response', [
            'status' => $response->getStatusCode(),
            'content' => method_exists($response, 'getContent') ? $response->getContent() : null,
            'execution_time_ms' => $duration * 1000,
        ]);

        return $response;
    }
}
