<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
        // Specify the table name
        protected $table = 'programs';

        // Define the fillable fields for mass assignment
        protected $fillable = [
            'name',           // Program name
            'description',    // Description of the program (optional)
        ];


        public function courses()
        {
            return $this->hasMany(Course::class);
        }
}
