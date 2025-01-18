<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDetailsController extends Controller
{

    public function showHours()
    {
        return view('Student.Student_Details.hours_taught');
    }

    public function showMidMarks()
    {
        return view('Student_Details.mid_marks');
    }

    public function uploadQuiz()
    {
        return view('Student_Details.upload_quiz');
    }

    public function uploadAssignment()
    {
        return view('Student_Details.upload_assignment');
    }
}
