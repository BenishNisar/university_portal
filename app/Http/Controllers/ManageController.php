<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.manage_exams.index');
    }
}
