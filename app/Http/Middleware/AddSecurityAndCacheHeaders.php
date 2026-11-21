<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSecurityAndCacheHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Remove any restrictive x-robots-tag or set permissive header for public indexing
        if ($response->headers->has('X-Robots-Tag')) {
            $currentRobots = $response->headers->get('X-Robots-Tag');
            if (stripos($currentRobots, 'none') !== false || stripos($currentRobots, 'noindex') !== false) {
                $response->headers->set('X-Robots-Tag', 'index, follow');
            }
        }

        // Cache-control for static-like or dynamic public pages
        if ($request->isMethod('GET') && !auth()->check() && !$request->ajax()) {
            // Allow client caching with validation for HTML
            $response->headers->set('X-Content-Type-Options', 'nosniff');
        }

        return $response;
    }
}
