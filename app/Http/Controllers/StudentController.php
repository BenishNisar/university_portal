<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\ManageStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
{
    $userId = auth()->user()->id;

    // Fetch ManageStudents data for the logged-in user
    $studentManage = ManageStudents::where('user_id', $userId)
        ->with(['user', 'course', 'department']) // Eager load related models
        ->first();

    // Redirect back if no data is found
    if (!$studentManage) {
        return redirect()->back()->with('error', 'No student data found.');
    }

    public function getCourseDetails(Request $request)
    {
        $courseId = $request->id;

        // Fetch the course by ID
        $course = Course::find($courseId);

        if ($course) {
            // Return data as JSON
            return response()->json([
                'exam' => $course->exam ?? 'N/A',
                'session' => $course->session ?? 'N/A',
                'hoursTaught' => $course->hours_taught ?? 'N/A', // Make sure these fields exist in your DB
                'remainingHours' => $course->remaining_hours ?? 'N/A',
            ]);
        }

        return response()->json(['error' => 'Course not found'], 404);
    }




    return view('Student.dashboard', compact('studentManage'));
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

































