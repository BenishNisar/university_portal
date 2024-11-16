<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizs extends Model
{
    use HasFactory;
    protected $table = 'quizs'; // Specify the table name

  // Explicitly specify the table name


  protected $fillable = [
      'semester_id',
      'subject_id',
      'quiz_number',
      'question',
      'answer_1',
      'answer_2',
      'answer_3',
      'answer_4',
      'correct_answer',
  ];


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function questions()
    {
        return $this->hasMany(Quest::class);
    }
    // In Quizs.php model
public function user()
{
    return $this->belongsTo(User::class);  // Assuming quizzes belong to users (students)
}

}
