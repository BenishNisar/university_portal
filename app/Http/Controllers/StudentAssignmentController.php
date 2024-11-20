<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentAssignmentController extends Controller
{
    public function index()
    {
        return view('Student.uploadAssignment.index');
    }
}
