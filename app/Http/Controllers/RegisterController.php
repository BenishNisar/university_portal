<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Correct import for Hash
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
$users=User::select("firstname","email","password")->get();
        return view("Dashboard.Auth.register",compact("users"));
    }

public function store(Request $request){
$validated=$request->validate([
"firstname"=>"required",
"email"=>"required",
"password" => "required|min:8|confirmed",


]);
$validated['password'] = Hash::make($validated['password']);

User::create($validated);

return redirect()->route("dashboard.auth.register");
}



}
