<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLanguage
{
    protected $supported_languages = ['hr', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('locale')) {
            session(['locale' => $request->getPreferredLanguage($this->supported_languages)]);
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
