<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class TeacherController extends Controller
{
    public function index()
    {
        // Fetch courses assigned to the current teacher
        // Modify the query as per your actual structure for assigned courses
        $courses = Course::where('status', 'assigned')->get();

        // Pass the courses to the view
        return view("Teacher.dashboard", compact('courses'));
    }
}
