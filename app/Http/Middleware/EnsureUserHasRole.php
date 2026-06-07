<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user()?->hasAnyRole($roles)) {
            return redirect()
                ->route('dashboard')
                ->with('toast', [
                    'type' => 'error',
                    'message' => 'You do not have permission to access this page.',
                ]);
        }

        return $next($request);
    }
}
