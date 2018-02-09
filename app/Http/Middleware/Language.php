<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     * If segment(1) not exist in supported languages, add & redirect!
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if ($request->segment(1) != 'admin') {
        //     if ( ! array_key_exists($request->segment(1), config('app.locales'))) {
        //         $segments = $request->segments();
        //         $segments = array_prepend($segments, config('app.fallback_locale'));
        //         return redirect()->to(implode('/', $segments));
        //     }
        // }

        return $next($request);
    }
}
