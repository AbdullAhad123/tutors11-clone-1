<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
    
        if ($this->isStaticFile($request->path())) {
            $response->header('Cache-Control', 'public, max-age=31536000');
        }
    
        return $response;
    }
    
    private function isStaticFile($path)
    {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        return in_array($extension, ['css', 'js', 'jpg', 'jpeg', 'png', 'gif']);
    }   
}
