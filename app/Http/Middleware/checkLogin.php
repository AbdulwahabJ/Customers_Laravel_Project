<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->status != 'admin'){
            \Log::info('User is not an admin.'); // Add this line for debugging

            Auth::logout();

            Session::flash('message', 'You are not authorized to access .'); // Flash the message

            return redirect()->route('login');
        }
        return $next($request);
    }
}
