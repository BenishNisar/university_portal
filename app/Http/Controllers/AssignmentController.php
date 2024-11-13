<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{

// Display a listing of assignments
public function index()
{
    $assignments = Assignment::with('course')->get();
    return view('Dashboard.admin.assignments.index', compact('assignments'));
}

// Show the form for creating a new assignment
public function add()
{
    $courses = Course::all(); // Fetch all courses
    if ($courses->isEmpty()) {
        // Handle the case where no courses exist
        return redirect()->back()->with('error', 'No courses available');
    }
    return view('Dashboard.admin.assignments.add', compact('courses'));
}

// Store a newly created assignment


public function store(Request $request)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required',
    ], [
        'course_id.required' => 'Please select a course from the dropdown.',
        'course_id.exists' => 'The selected course does not exist in the database.',
    ]);


    // Proceed with saving assignment if validation passes
    $assignment = Assignment::create($validated);

    return redirect()->route('admin.assignments.index')->with('success', 'Assignment added successfully');
}



// Show the form for editing the specified assignment
public function edit($id)
{
    $assignment = Assignment::findOrFail($id);
    $courses = Course::all(); // Fetch all courses
    return view('Dashboard.admin.assignments.edit', compact('assignment', 'courses'));
}

// Update the specified assignment
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required',
    ]);

    try {
        $assignment = Assignment::findOrFail($id);
        $assignment->update($validated);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to update assignment: ' . $e->getMessage()]);
    }

    return redirect()->route('admin.assignments.index')->with('success', 'Assignment updated successfully!');
}

// Remove the specified assignment
public function destroy($id)
{
    $assignment = Assignment::findOrFail($id);
    $assignment->delete();

    return redirect()->route('admin.assignments.index')->with('success', 'Assignment deleted successfully!');
}





}
