<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AssignmentsController extends Controller
{
    public function index()
    {
        // Assuming you have the courses data you want to pass to the view
        $courses = Course::all(); // Get all courses or specific data

        // Pass the $courses variable to the view
        return view('teacher.assignmentes.index', compact('courses'));
    }


    // Toggle assignments ka logic
   // In your AssignmentsController

public function toggleAssignments($courseId)
{
    // Retrieve the course using the $courseId
    $course = Course::findOrFail($courseId);

    // Toggle logic (e.g., enabling/disabling assignments)
    $course->assignments_enabled = !$course->assignments_enabled;
    $course->save();

    // Redirect back or show a success message
    return redirect()->route('teacher.assignmentes.index')->with('status', 'Assignments toggled successfully!');
}


}
