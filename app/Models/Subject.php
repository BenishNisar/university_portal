<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'semester_id'];


    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quizs::class, 'subject_id');
    }
}
