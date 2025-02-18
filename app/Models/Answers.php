<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;


    protected $table = 'answers';

    public function quest()
    {
        return $this->belongsTo(Quest::class);
    }
}
