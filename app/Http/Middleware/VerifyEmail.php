<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            // Redirect or display a message as per your requirements
            return redirect('/verification-notice')->with('message', 'You must verify your email address to log in.');
        }
        return $next($request);
    }
}
