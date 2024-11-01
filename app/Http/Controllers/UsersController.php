<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
       // Display a listing of the users
       public function index()
       {
           $users = DB::select('select * from users');
           return view('Dashboard.admin.users.index', compact('users'));
       }

       // Show the form for creating a new user
       public function add()
       {
           return view('Dashboard.Admin.users.add');
       }

       // Store a newly created user in storage
       public function store(Request $request)
       {
           // Validate incoming request
           $request->validate([
               'firstname' => 'required|string|max:255',
               'lastname' => 'required|string|max:255',
               'email' => 'required|email|unique:users,email',
               'password' => 'required|string|min:8',
               'role_id' => 'required|integer',
               'department_id' => 'required|integer',
               'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
               'gender' => 'nullable|string',
               'country' => 'required|string',
               'city' => 'nullable|string',
           ]);

           // Handle file upload
           $path = null;
           if ($request->hasFile('profile_img')) {
               $path = $request->file('profile_img')->store('profile_images', 'public'); // Store in 'storage/app/public/profile_images'
           }

           // Create new user with encrypted password
           User::create([
               'firstname' => $request->firstname,
               'lastname' => $request->lastname,
               'email' => $request->email,
               'password' => Hash::make($request->password), // Encrypting password
               'role_id' => $request->role_id,
               'department_id' => $request->department_id,
               'profile_img' => $path, // Save the path to the profile image
               'gender' => $request->gender,
               'country' => $request->country,
               'city' => $request->city,
           ]);

           return redirect()->route('admin.users.index')->with('success', 'User added successfully.');

        }

       // Show the form for editing the specified user
       public function edit($id)
       {
           $user = User::findOrFail($id);
           return view('Dashboard.Admin.users.edit', compact('user'));
       }

       // Update the specified user in storage
       public function update(Request $request, $id)
       {
           $request->validate([
               'firstname' => 'required|string|max:200',
               'lastname' => 'required|string|max:599',
               'email' => 'required|string|email|max:400|unique:users,email,'.$id,
               'password' => 'nullable|string|min:8',
               'role_id' => 'required|integer',
               'department_id' => 'required|integer',
               'profile_img' => 'nullable|string|max:200',
               'gender' => 'nullable|in:female,male',
               'country' => 'required|string|max:300',
               'city' => 'nullable|string|max:300',
           ]);

           $user = User::findOrFail($id);
           $user->firstname = $request->firstname;
           $user->lastname = $request->lastname;
           $user->email = $request->email;
           if ($request->password) {
               $user->password = bcrypt($request->password); // Encrypting the password
           }
           $user->role_id = $request->role_id;
           $user->department_id = $request->department_id;
           $user->profile_img = $request->profile_img;
           $user->gender = $request->gender;
           $user->country = $request->country;
           $user->city = $request->city;
           $user->save();

           return redirect()->route('admin.users.index')->with('success', 'User added successfully.');

       }

       // Remove the specified user from storage
       public function destroy($id)
       {
           // Use the DB facade to delete the user directly
           $deleted = DB::table('users')->where('id', $id)->delete();

           // Check if the deletion was successful
           if ($deleted) {
               return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
           } else {
               return redirect()->route('admin.users.index')->with('error', 'User deletion failed.');
           }
       }

}
