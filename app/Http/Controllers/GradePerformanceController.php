<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradePerformanceController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.grade_performance.index');
    }
}
