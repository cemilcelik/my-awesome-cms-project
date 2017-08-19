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
        // dd(config('translatable.locales'));
        // dd($request->segments());

        if ( ! array_key_exists($request->segment(1), config('translatable.locales'))) {
            
            $segments = $request->segments();

            // dd($segments);

            $segments = array_prepend($segments, config('app.fallback_locale'));

            return redirect()->to(implode('/', $segments));

        }

        return $next($request);
    }
}
