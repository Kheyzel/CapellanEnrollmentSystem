<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    public $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function yearlevel()
    {
        return $this->belongsTo(Yearlevel::class);
    }

    public function Tuitionpayment()
    {
        return $this->hasMany(Tuitionpayment::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

     public function G11Completer()
     {
         return $this->hasMany(G11Completer::class);
  
     }

     
     public function graduates()
     {
         return $this->hasOne(Graduate::class);
  
     }


    

    public function sex_count($sex)
    {
        return Student::where('sex','=',$sex)->count();
    }
}
