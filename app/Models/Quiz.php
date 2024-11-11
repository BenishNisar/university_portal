<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question; // Add this line


class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'title', 'description', 'due_date'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

     public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function correctOption()
    {
        return $this->belongsTo(Option::class, 'correct_option_id');
    }


// In Quiz.php
public function batches()
{
    return $this->belongsToMany(Batch::class, 'batch_quiz', 'quiz_id', 'batch_id');
}


}
