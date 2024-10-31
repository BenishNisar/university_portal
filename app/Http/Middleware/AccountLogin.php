<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect based on role_id
            if ($user->role_id == 1) {
                return redirect('/');
            } elseif ($user->role_id == 2) {
                return redirect('teacher/dashboard');
            } elseif ($user->role_id == 3) {
                return redirect('student/dashboard');
            } else {
                // Logout and redirect if role is unrecognized
                Auth::logout();
                return redirect('/login')->with('status', 'Unauthorized Access');
            }
        }

        // If user is not logged in, redirect to login page
        return redirect('/login')->with('status', 'Please login first');
    }
}
