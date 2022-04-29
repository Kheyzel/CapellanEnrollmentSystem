<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
