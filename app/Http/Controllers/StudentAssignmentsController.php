<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentAssignmentsController extends Controller
{

    public function index(){
        $courses = Course::with(['assignments', 'quizzes'])->get();
        $assignments = AssignmentSubmission::all(); // Or any specific filter logic if needed
        return view('student.assignments.index', compact('courses', 'assignments'));
    }
// Show the list of assignments and quizzes for each course
public function showAssignmentsAndQuizzes()
{
    $courses = Course::with(['assignments', 'quizzes'])->get();

    // You may want to load all assignments for each course (including assignments already uploaded by students).
    $assignments = AssignmentSubmission::all(); // Or any specific filter logic if needed

    return view('student.assignments.index', compact('courses', 'assignments'));
}

// Upload assignment for the student
public function uploadAssignment(Request $request, $courseId)
{
    // Validate the uploaded file
    $request->validate([
        'assignment' => 'required|file|mimes:pdf,docx|max:2048',
    ]);

    // Store the assignment file
    $path = $request->file('assignment')->store('assignments', 'public');

    // Save the assignment submission
    AssignmentSubmission::create([
        'user_id' => Auth::id(),  // Store the currently authenticated user's ID
        'course_id' => $courseId, // Course the assignment is for
        'title' => $request->input('title'),  // Title of the assignment
        'description' => $request->input('description'),  // Description of the assignment
        'file_path' => $path,  // Path where the file is stored
    ]);

    return redirect()->back()->with('status', 'Assignment uploaded successfully!');
}



// Upload quiz for the student
public function uploadQuiz(Request $request, $courseId)
{
    $request->validate([
        'quiz' => 'required|file|mimes:pdf,docx|max:2048',
    ]);

    // Store the quiz file
    $path = $request->file('quiz')->store('quizzes', 'public');

    // Create a quiz record
    Quiz::create([
        'course_id' => $courseId,
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'file_path' => $path,
        'uploaded_by' => Auth::id(),
    ]);

    return redirect()->back()->with('status', 'Quiz uploaded successfully!');
}
}
