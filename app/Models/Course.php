<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
    ];

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class, 'course_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
