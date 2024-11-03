<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewEnrolledController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.view_enrolled.index');
    }
}
