<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'classes'; 
    
    public function teacher()
    {   
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_student','class_id', 'student_id');
    }
}