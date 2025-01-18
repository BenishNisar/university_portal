<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MycourseController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database
        return view('Student.mycourse.index');

    }
}
