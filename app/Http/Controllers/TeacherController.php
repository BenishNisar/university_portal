<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Course;
use App\Models\User;

use App\Models\CourseAssign;
use Illuminate\Http\Request;


class TeacherController extends Controller
{

    public function index()
    {
        // Fetch all programs and courses
        $programs = Program::all();
        $allCourses = Course::all();

        // Get assigned courses for the logged-in teacher (if needed)
        $programIds = $programs->pluck('id')->toArray();

        $assignedCourses = CourseAssign::where('user_id', auth()->id())
            ->whereIn('program_id', $programIds) // Use whereIn for multiple IDs
            ->with('course')
            ->get();



        // Pass the courses and assigned courses to the view
        return view('Teacher.dashboard', compact('programs', 'allCourses', 'assignedCourses'));
    }
    public function fetchCourses($programId)
    {
        if (!$programId) {
            return response()->json([
                'allCourses' => [],
                'assignedCourses' => []
            ]);
        }

        // Fetch courses for the selected program
        $allCourses = Course::where('program_id', $programId)->get();

        // Fetch courses assigned to the teacher for the program
        $assignedCourses = CourseAssign::where('user_id', auth()->id())
            ->where('program_id', $programId)
            ->with('course') // Ensure the course relationship exists
            ->get();

        return response()->json([
            'allCourses' => $allCourses,
            'assignedCourses' => $assignedCourses
        ]);
    }








    public function getCoursesForProgram($programId)
    {
        // Fetch all courses for the selected program
        $allCourses = Course::where('program_id', $programId)->get();

        // Fetch assigned courses for the logged-in teacher
        $assignedCourses = CourseAssign::where('teacher_id', auth()->user()->id)
            ->where('program_id', $programId)
            ->with('course') // Ensure this is working with a relationship to load course data
            ->get();

        return response()->json([
            'allCourses' => $allCourses,
            'assignedCourses' => $assignedCourses
        ]);
    }






    public function assignCourse(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Assign course to the teacher (auth()->id() fetches the logged-in teacher's id)
        CourseAssign::create([
            'teacher_id' => auth()->id(),
            'course_id' => $validated['course_id'],
        ]);

        return response()->json(['message' => 'Course assigned successfully.']);
    }

    public function unassignCourse(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Unassign the course from the teacher
        CourseAssign::where('teacher_id', auth()->id())
            ->where('course_id', $validated['course_id'])
            ->delete();

        return response()->json(['message' => 'Course unassigned successfully.']);
    }


}
