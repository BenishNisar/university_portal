<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.exam_schedule.index');
    }
}
