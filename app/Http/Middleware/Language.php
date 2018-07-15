<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class Language
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
        $lang = $request->segment(1);
        if (in_array($lang, Config::get('app.alt_langs'))) {            
            config(['app.locale' => $lang]);
        } else {
            config(['app.locale' => 'en']);
        }
        
        return $next($request);
    }
}
