<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'title',
        'description',
        'file_path',
    ];

    public function showAssignments($courseId)
{
    // Get the assignments for the course
    $assignments = AssignmentSubmission::where('course_id', $courseId)->get();

    return view('teacher.assignments', compact('assignments'));
}
}
