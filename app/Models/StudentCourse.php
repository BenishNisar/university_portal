<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

   // Define relationships

    /**
     * Get the user associated with the student.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the course associated with the student.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the department associated with the student.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get all students enrolled in a specific course.
     */
    public function studentsInCourse()
    {
        return $this->hasMany(ManageStudents::class, 'course_id');
    }

    /**
     * Get all students in the same department.
     */
    public function studentsInDepartment()
    {
        return $this->hasMany(ManageStudents::class, 'department_id');
    }
}
