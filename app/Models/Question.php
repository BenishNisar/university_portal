<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
class Question extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id', 'text', 'correct_option_id','batch_id'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }


    public function correctOption()
    {
        return $this->belongsTo(Option::class, 'correct_option_id');
    }
}
