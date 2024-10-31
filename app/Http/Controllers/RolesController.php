<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('Dashboard.admin.roles.index', compact('roles'));
    }

    // Show the form for creating a new role
    public function add()
    {
        return view('Dashboard.admin.roles.add');
    }

    // Store a newly created role in storage
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name',
        ]);

        Role::create([
            'role_name' => $request->role_name,
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role added successfully.');
    }

    // Show the form for editing the specified role
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('Dashboard.admin.roles.edit', compact('role'));
    }

    // Update the specified role in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,role_name,' . $id,
        ]);

        $role = Role::findOrFail($id);
        $role->role_name = $request->role_name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    // Remove the specified role from storage
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
