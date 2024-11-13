<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class QuizsController extends Controller
{

     // Display all courses and their quiz settings
     public function index()
     {
         $courses = Course::all(); // Fetch all courses, or you can add specific filters if necessary
         return view('teacher.quizzes.index', compact('courses'));
     }

     // Toggle the quizzes_enabled setting for a specific course
     public function toggleQuizzes($courseId)
     {
         $course = Course::findOrFail($courseId); // Find the course by ID

         // Toggle the quizzes_enabled status (enable/disable)
         $course->quizzes_enabled = !$course->quizzes_enabled;
         $course->save();

         // Redirect back with a success message
         return redirect()->route('teacher.quizzes.index')->with('status', 'Quizzes toggled successfully!');
     }


}
