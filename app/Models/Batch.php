<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'name',
        'start_year',
        'end_year',
    ];

// In Batch.php model
public function quizzes()
{
    return $this->belongsToMany(Quiz::class, 'batch_quiz', 'batch_id', 'quiz_id');
}




}
