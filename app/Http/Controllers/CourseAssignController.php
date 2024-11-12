<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\CourseAssign;
use App\Models\Course;
use App\Models\Batch;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class CourseAssignController extends Controller
{
    public function index()
    {
        $courseAssignments = CourseAssign::with(['course', 'batch', 'teacher', 'department'])->get();
        return view('Dashboard.admin.course_assign.index', compact('courseAssignments'));
    }

    public function add()
    {
        $courses = Course::all();
        $batches = Batch::all();
        $teachers = User::all(); // Fetch only teachers

        $departments = Department::all();

        return view('Dashboard.admin.course_assign.add', compact('courses', 'batches', 'teachers', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'batch_id' => 'required',
            'user_id' => 'required',
            'department_id' => 'required',
            'semester' => 'required',
            'year' => 'required|integer',
        ]);

        CourseAssign::create($request->all());
        return redirect()->route('admin.course_assign.index')->with('success', 'Course assignment created successfully.');
    }

    public function edit($id)
    {
        $courseAssign = CourseAssign::findOrFail($id);
        $courses = Course::all();
        $batches = Batch::all();
        $teachers = User::with('role')->where('role_id', 1)->get(); // Adjust based on your criteria
        $departments = Department::all();

        return view('Dashboard.admin.course_assign.edit', compact('courseAssign', 'courses', 'batches', 'teachers', 'departments'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'batch_id' => 'required',
            'user_id' => 'required',
            'department_id' => 'required',
            'semester' => 'required',
            'year' => 'required|integer',
        ]);

        $courseAssign = CourseAssign::findOrFail($id);
        $courseAssign->update($request->all());

        return redirect()->route('admin.course_assign.index')->with('success', 'Course assignment updated successfully.');
    }

    public function destroy($id)
    {
        $courseAssign = CourseAssign::findOrFail($id);
        $courseAssign->delete();

        return redirect()->route('admin.course_assign.index')->with('success', 'Course assignment deleted successfully.');
    }

}
