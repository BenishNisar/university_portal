<?php

namespace App\Http\Controllers;
use App\Models\Quizs;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class ViewQuizesController extends Controller
{
    public function index()
    {
        $quizzes = Quizs::with('semester', 'subject')->get(); // Fetch quizzes with relations
        return view('Teacher.view_quizzes.index', compact('quizzes'));
    }



    public function views($subjectId)
    {
        // Fetch the subject and its related quizzes along with the user
        $subject = Subject::with(['quizzes.user'])->findOrFail($subjectId);

        // Fetch quizzes related to the given subject ID
        $quizzes = Quizs::with(['semester', 'subject', 'user'])  // Include the user (student) relationship
                        ->where('subject_id', $subjectId)
                        ->get();

        // Fetch semesters and their related subjects (optional)
        $semesters = Semester::with('subjects')->get();

        // Passing subject, quizzes, and semesters to the view
        return view('Teacher.view_quizzes.views', compact('subject', 'quizzes', 'semesters'));
    }








}
