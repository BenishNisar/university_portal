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
        
        'assignments_enabled',
        'quizzes_enabled',
'program_id',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // Define the relationship to quizzes
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function courseAssigns()
    {
        return $this->hasMany(CourseAssign::class, 'course_id');
    }

}
