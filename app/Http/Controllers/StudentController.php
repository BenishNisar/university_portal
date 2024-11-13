<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\StudentCourse;
use App\Models\Course;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id;

        // Fetch completed, remaining, and enrolled courses for the user
        $completedCourses = StudentCourse::where('user_id', $userId)
                            ->where('status', 'completed')
                            ->with('course') // Updated to match relationship method name
                            ->get();

        $remainingCourses = StudentCourse::where('user_id', $userId)
                            ->where('status', 'remaining')
                            ->with('course')
                            ->get();

        $enrolledCourses = StudentCourse::where('user_id', $userId)
                            ->where('status', 'enrolled')
                            ->with('course')
                            ->get();

        return view('Student.dashboard', compact('completedCourses', 'remainingCourses', 'enrolledCourses'));
    }




    // public function showDashboard($userId)
    // {
    //     // Check if the user ID is valid, if not, handle the error (optional)

    //     // Fetch courses based on their status for the specific student
    //     $completedCourses = StudentCourse::where('user_id', $userId)->where('status', 'completed')->get();
    //     $remainingCourses = StudentCourse::where('user_id', $userId)->where('status', 'remaining')->get();


    //     // Also, fetch all available courses to populate dropdown in the form
    //     $courses = Course::all();

    //     // Pass data to the view
    //     return view('student.dashboard', compact('completedCourses', 'remainingCourses',  'courses'));
    // }







       }

































