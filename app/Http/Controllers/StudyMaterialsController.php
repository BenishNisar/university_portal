<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyMaterialsController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        return view('Dashboard.admin.study_material.index');
    }
}
