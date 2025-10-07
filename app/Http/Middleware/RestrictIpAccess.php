<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictIpAccess
{
    protected array $allowedIps = [
        '127.0.0.1',
        '::1',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->ip(), $this->allowedIps, true)) {
            return response('Acesso não autorizado.', 403);
        }

        return $next($request);
    }
}
