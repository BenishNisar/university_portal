<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Course; // Assuming Course is the model for 'courses' table
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all();
        return view('Dashboard.admin.courses.index', compact('courses'));
    }

    public function add()
    {
        // Show form to add a new course
        return view('Dashboard.admin.courses.add');
    }

    public function store(Request $request)
    {
        // Validate and store a new course
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'description' => 'nullable|string',
            'status' => 'required|in:available,assigned',
        ]);

        Course::create($request->all());
        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        // Find the course by ID and show the edit form
        $course = Course::findOrFail($id);
        return view('Dashboard.admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the course
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,'.$id,
            'description' => 'nullable|string',
            'status' => 'required|in:available,assigned',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        // Find the course by ID and delete it
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

}