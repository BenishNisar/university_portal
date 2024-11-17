<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssign extends Model
{
    use HasFactory;
    protected $table = 'course_assign'; // Specify the correct table name
 protected $fillable = ['course_id', 'batch_id', 'user_id', 'department_id', 'semester', 'year','program'];



 public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
 public function user()
 {
     return $this->belongsTo(User::class, 'user_id', 'id');
 }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
