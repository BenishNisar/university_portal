<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
     // Defining the relationship with the Course model
     public function course()
     {
         return $this->belongsTo(Course::class, 'course_id');
     }

     // Defining the relationship with the User model (student)
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
