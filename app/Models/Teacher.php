<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
