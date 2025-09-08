<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        $user = $request->user();
        if (!$user) {
            throw new AccessDeniedHttpException('Authentication required');
        }
        if (empty($roles)) {
            return $next($request);
        }
        if (!in_array($user->role, $roles, true)) {
            throw new AccessDeniedHttpException('Insufficient permissions');
        }
        return $next($request);
    }
}
