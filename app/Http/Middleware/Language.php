<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Support\Facades\Session;

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
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
            if (in_array($locale, Config::get('app.alt_langs'))) {            
                config(['app.locale' => $locale]);
            }
        } else {
            $defaultLocale = Config::get('app.locale');
            $request->session()->put('locale', $defaultLocale);
            config(['app.locale' => $defaultLocale]);
        }
        
        return $next($request);
    }
}
