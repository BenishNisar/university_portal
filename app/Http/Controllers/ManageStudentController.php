<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ManageStudents;
use Illuminate\Http\Request;

class ManageStudentController extends Controller
{
    public function index()
    {
        // Fetch all departments from the database

        $students = ManageStudents::with(['user', 'course', 'department'])->get();

        return view('Dashboard.admin.manage_students.index', compact('students'));

    }
}
