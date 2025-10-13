<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
