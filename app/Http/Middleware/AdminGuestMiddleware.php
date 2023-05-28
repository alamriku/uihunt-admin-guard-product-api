<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminGuestMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param ...$parameters
     * @param string $guard
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $guard = 'admin', ...$parameters): Response
    {
        $guard = $parameters[0] ?? $guard;

        if(Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
