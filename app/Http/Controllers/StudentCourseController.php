<?php

namespace App\Http\Controllers;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{

// Show all student courses
public function index()
{
    $courses = StudentCourse::with('course')->where('user_id', auth()->user()->id)->get();
    return view('Dashboard.admin.student_courses.index', compact('courses'));
}

// Show the form for creating a new course
public function add()
{
    $courses = Course::all();
    $students = User::with('role')->get();  // Fetch all students with their role

    return view('Dashboard.admin.student_courses.add', compact('courses', 'students'    ));
}

// Store a newly created course
public function store(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'status' => 'required|in:enrolled,completed,remaining',
    ]);

    $course = new StudentCourse();
    $course->user_id = auth()->user()->id;
    $course->course_id = $request->course_id;
    $course->status = $request->status;
    $course->save();

    return redirect()->route('admin.student_courses.index')->with('success', 'Course added successfully.');
}

// Show the form for editing the specified course
public function edit($course_id)
{
    $course = StudentCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();
    $courses = Course::all();
    if (!$course) {
        return redirect()->route('student_courses.index')->with('error', 'Course not found.');
    }
    return view('student_courses.edit', compact('course', 'courses'));
}

// Update the specified course
public function update(Request $request, $course_id)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'status' => 'required|in:enrolled,completed,remaining',
    ]);

    $course = StudentCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();
    if (!$course) {
        return redirect()->route('student_courses.index')->with('error', 'Course not found.');
    }

    $course->course_id = $request->course_id;
    $course->status = $request->status;
    $course->save();

    return redirect()->route('student_courses.index')->with('success', 'Course updated successfully.');
}

// Remove the specified course from the list
public function destroy($course_id)
{
    $course = StudentCourse::where('user_id', auth()->user()->id)->where('course_id', $course_id)->first();
    if (!$course) {
        return redirect()->route('student_courses.index')->with('error', 'Course not found.');
    }

    $course->delete();
    return redirect()->route('student_courses.index')->with('success', 'Course removed successfully.');
}

}
