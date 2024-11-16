<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

        // Define the subjects relationship
        public function subjects()
        {
            return $this->hasMany(Subject::class);
        }

        public function quizzes()
        {
            return $this->hasMany(Quizs::class, 'semester_id');
        }
}
