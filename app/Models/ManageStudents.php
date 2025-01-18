<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageStudents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'phone_number', 'date_of_birth', 'gender', 'address', 'student_id', 'courses_id', 'department_id', 'enrollment_date', 'graduation_date', 'current_year', 'cgpa', 'profile_picture', 'status', 'guardian_name', 'guardian_contact', 'scholarship_status', 'student_type','Batch'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    
}
