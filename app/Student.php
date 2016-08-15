<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements Authenticatable
{
    use  \Illuminate\Auth\Authenticatable;

    protected $fillable=['name','indexno','password'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password']=bcrypt($password);
    }

    public function semesters()
    {
        return $this->hasMany('App\Semester','studentid');
    }

    public function semester($sem_no)
    {
        $student=\Auth::user();
        $semester=Semester::where('no',$sem_no)->where('studentid',$student->id)->first();
        if($semester==null)
        {
            $semester=Semester::create(['no'=>$sem_no,'studentid'=>$student->id]);
        }
        return $semester;
    }
}
