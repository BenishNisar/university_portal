<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AssignmentSubmissionController extends Controller
{
    // Display all assignment submissions with related assignments and users
    public function index()
    {
        // Fetch assignment submissions with the related assignment and user
        $submissions = DB::select("
            SELECT assignment_submissions.*, assignments.title as assignment_title, users.firstname as student_name
            FROM assignment_submissions
            LEFT JOIN assignments ON assignment_submissions.id = assignments.id
            LEFT JOIN users ON assignment_submissions.user_id = users.id
        ");

        // Return the data to the view
        return view('teacher.assignment_submission.index', compact('submissions'));
    }
}
