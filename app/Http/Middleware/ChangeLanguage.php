<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'lang' parameter is set and equal to 'en'
        if ($request->filled('lang') && $request->lang == 'en') {
            // Set the application locale to English
            app()->setLocale('en');
        } else {
            // Set the application locale to Arabic by default
            app()->setLocale('ar');
        }

        return $next($request);
    }
}
