<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PromoterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if promoter is in the session
        if (!$request->session()->has('promoter')) {
            return redirect()->route('promoter.login.form')->withErrors([
                'message' => 'You must be logged in to access this page.',
            ]);
        }

        return $next($request);

    }
}
