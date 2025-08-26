<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheStaticAssets
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('Expires', now()->addWeek()->format('D, d M Y H:i:s \G\M\T'));
        $response->header('Cache-Control', 'public, max-age=604800'); // Cache for 1 week
        return $response;
    }
}
