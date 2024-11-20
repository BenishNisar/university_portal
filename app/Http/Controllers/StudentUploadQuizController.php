<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentUploadQuizController extends Controller
{
    public function index()
    {
        return view('Student.uploadQuiz.index');
    }
}
