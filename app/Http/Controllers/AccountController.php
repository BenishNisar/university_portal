<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function accountlogin()
    {
        return view('Dashboard.auth.accountlogin');
    }

    public function accountloginstore(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check role_id and redirect accordingly
            if ($user->role_id == 1) {
                return redirect('/');
            } elseif ($user->role_id == 2) {
                return redirect('teacher/dashboard');
            } elseif ($user->role_id == 3) {
                return redirect('student/dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->with('status', 'Unauthorized Access');
            }
        }

        return redirect('/account/login')->with('login_error', 'Incorrect Email & Password');
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/account/login')->with('status', 'Logged out successfully');
}


}
