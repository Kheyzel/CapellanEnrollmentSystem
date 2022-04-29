<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Student;

class Course extends Model
{
    protected $table = 'course';
    public $guarded = [];

    public function student()
    {
        return $this->hasMany(Student::class);
    }


}
