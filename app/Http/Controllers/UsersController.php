<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Batch; // Import the Batch model at the top
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
       // Display a listing of the users
       public function index()
       {
        $users = User::with(['department', 'role'])->get();

           return view('Dashboard.admin.users.index', compact('users'));
       }

       // Show the form for creating a new user
       public function add()
       {
        $roles = Role::all();
        $departments = Department::all();

    $batches = Batch::all(); // Load batches

        return view('Dashboard.Admin.users.add', compact('roles', 'departments','batches'));

       }

       // Store a newly created user in storage
       public function store(Request $request)
       {
           $request->validate([
               'firstname' => 'required|string|max:255',
               'lastname' => 'required|string|max:255',
               'email' => 'required|email|unique:users,email',
               'password' => 'required|string|min:8',
               'role_id' => 'required|integer',
               'department_id' => 'required|integer',
               'batch_id' => 'nullable|integer', // Validate batch_id
               'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
               'gender' => 'nullable|string',
               'country' => 'required|string',
               'city' => 'nullable|string',
           ]);

           $path = null;
           if ($request->hasFile('profile_img')) {
               $destinationPath = public_path('assets/profile_images');
               $file = $request->file('profile_img');
               $filename = time() . '_' . $file->getClientOriginalName();
               $file->move($destinationPath, $filename);
               $path = 'assets/profile_images/' . $filename;
           }

           User::create([
               'firstname' => $request->firstname,
               'lastname' => $request->lastname,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'role_id' => $request->role_id,
               'department_id' => $request->department_id,
               'batch_id' => $request->batch_id, // Store batch_id
               'profile_img' => $path,
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
           $roles = Role::all(); // Get all roles
           $departments = Department::all(); // Get all departments
           $batches = Batch::all(); // Load batches

           return view('Dashboard.Admin.users.edit', compact('user', 'roles', 'departments', 'batches'));
       }


       // Update the specified user in storage
       public function update(Request $request, $id)
       {
           $request->validate([
               'firstname' => 'required|string|max:200',
               'lastname' => 'required|string|max:599',
               'email' => 'required|string|email|max:400|unique:users,email,' . $id,
               'password' => 'nullable|string|min:8',
               'role_id' => 'required|integer',
               'department_id' => 'required|integer',
               'batch_id' => 'nullable|integer', // Validate batch_id
               'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
               'gender' => 'nullable|in:female,male',
               'country' => 'required|string|max:300',
               'city' => 'nullable|string|max:300',
           ]);

           $user = User::findOrFail($id);
           $user->firstname = $request->firstname;
           $user->lastname = $request->lastname;
           $user->email = $request->email;

           if ($request->password) {
               $user->password = bcrypt($request->password);
           }

           $user->role_id = $request->role_id;
           $user->department_id = $request->department_id;
           $user->batch_id = $request->batch_id; // Update batch_id

           if ($request->hasFile('profile_img')) {
               $destinationPath = public_path('assets/profile_images');
               $file = $request->file('profile_img');
               $filename = time() . '_' . $file->getClientOriginalName();
               $file->move($destinationPath, $filename);
               $user->profile_img = 'assets/profile_images/' . $filename;
           }

           $user->gender = $request->gender;
           $user->country = $request->country;
           $user->city = $request->city;
           $user->save();

           return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
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
