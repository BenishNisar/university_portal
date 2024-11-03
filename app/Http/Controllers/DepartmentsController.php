<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    // Display a listing of the departments
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.departments.index');
    }

    // Show the form for creating a new department
    public function add()
    {
        return view('Dashboard.admin.departments.add');
    }

    // Store a newly created department in storage
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'department_name' => 'required|string|max:255|unique:departments,department_name',
        ]);

        // Create a new department
        Department::create([
            'department_name' => $request->department_name,
        ]);

        return redirect()->route('admin.departments.index')->with('success', 'Department added successfully.');
    }

    // Show the form for editing the specified department
    public function edit($id)
    {
        // Find the department by ID
        $department = Department::findOrFail($id);
        return view('Dashboard.admin.departments.edit', compact('department'));
    }

    // Update the specified department in storage
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'department_name' => 'required|string|max:255|unique:departments,department_name,' . $id,
        ]);

        // Find the department and update it
        $department = Department::findOrFail($id);
        $department->department_name = $request->department_name;
        $department->save();

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    // Remove the specified department from storage
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
}
