<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable=['no','studentid'];

    public function subjects()
    {
        return $this->hasMany('App\Subject','semid');
    }

    public function subject($subjectname,$semid)
    {
        return Subject::where('subjectname',$subjectname)->where('semid',$semid)->first();
    }
}
