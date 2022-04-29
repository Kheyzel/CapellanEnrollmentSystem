<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tuitionpayment extends Model
{
    protected $table = 'tuitionpayment';
    public $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
