<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function postAddStudent(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'indexno'=>'required|min:6|max:6|unique:students',
            'password'=>'required|min:4|confirmed'
        ]);

        $input=$request->all();
        $student=Student::create($input);

        Auth::login($student);
        return redirect('/Results/Semester1');

    }

    public function addStudent()
    {
        return view('AddStudent');
    }

    public function logStudent()
    {
        return view('LogStudent');
    }

    public function postlogStudent(Request $request)
    {
        $this->validate($request,[
            'indexno'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt(['indexno'=>$request['indexno'],'password'=>$request['password']]))
        {
            return redirect('/Results/Semester1');
        }
        session()->flash('login_error','Login failed...!');
        return redirect()->back()->withInput($request->all());
    }

    public function logOutStudent()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
