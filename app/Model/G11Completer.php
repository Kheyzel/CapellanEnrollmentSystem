<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class G11Completer extends Model
{
    protected $table = 'grade11completer';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
