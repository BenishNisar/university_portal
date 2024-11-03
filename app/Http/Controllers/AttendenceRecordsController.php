<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendenceRecordsController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.attendence_records.index');
    }
}
