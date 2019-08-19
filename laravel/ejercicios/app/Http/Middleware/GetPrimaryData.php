<?php

namespace App\Http\Middleware;

use Closure;

class GetPrimaryData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $genres = \App\Genre::orderBy('name')->get();
        return $next($request)->with('genres', $genres);
    }
}
