<?php

namespace App\Http\Controllers;

use App\Calculater;
use App\Semester;
use App\Subject;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;

class SemesterController extends Controller
{
    public function showResults($sem)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8) {
            $student = \Auth::user();

            $semester = $student->semester($sem_no);
            $subjects = $semester->subjects;
            $subjectNames = array();
            $moduleCodes = array();
            $credits = array();
            $grades = array();
            $currentSemNo = $semester->no;
            $semesterGPA = Calculater::calSemesterGPA($semester);
            $studentGPA = Calculater::calStudentGPA($student);
            $studentName = $student->name;
            $studentIndexNo = $student->indexno;
            foreach ($subjects as $subject) {
                $subjectNames[] = $subject->subjectname;
                $moduleCodes[] = $subject->modulecode;
                $credits[] = $subject->credit;
                $grades[] = $subject->grade;
            }

            return view('Results', compact('studentName', 'studentIndexNo', 'subjectNames', 'moduleCodes', 'credits', 'grades',
                'currentSemNo', 'semesterGPA', 'studentGPA'));
        }
        return abort(404,'Page Not Found');
    }

    public function editSubject($sem,$subjectname)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8) {
            $student=\Auth::user();
            $semester=$student->semester($sem_no);
            $subject = $semester->subject($subjectname,$semester->id);
            return view('EditSubject', compact('subject','sem_no'));
        }
        return abort(404,'Page Not Found');
    }

    public function postEditSubject($sem,$subjectname,Request $request)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8) {
            $input=$request->all();
            $student=\Auth::user();
            $semester=$student->semester($sem_no);
            $subject=$semester->subject($subjectname,$semester->id);
            $this->validate($request,['subjectname'=>'required|unique:subjects,subjectname,'.$subject->id.',,semid,'.$semester->id]);
            $subject->update($input);
            return redirect('/Results/'.$sem);
        }
        return abort(404,'Page Not Found');
    }

    public function addSubject($sem)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8)
            return view('AddSubject',compact('sem_no'));
        return abort(404,'Page Not Found');
    }

    public function postAddSubject($sem,Request $request)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8)
        {
            $this->validate($request,['subjectname'=>'required']);
            $input=$request->all();
            $student=\Auth::user();
            $semester=$student->semester($sem_no);
            $this->validate($request,['subjectname'=>'unique:subjects,subjectname,,,semid,'.$semester->id]);
            $subject=new Subject($input);
            $subject->semid=$semester->id;
            $subject->save();
            session()->flash('flash_message','New Subject was added successfully...!');
            return redirect('/Results/'.$sem);
        }
        return abort(404,'Page Not Found');
    }

    public function deleteSubject($sem,$subjectname)
    {
        $sem_no=str_split($sem,8)[1];        //semester1 > semester 1
        if(1<=$sem_no && $sem_no<=8) {
            $student=\Auth::user();
            $semester=$student->semester($sem_no);
            $subject=$semester->subject($subjectname,$semester->id);
            Subject::destroy($subject->id);
            session()->flash('flash_message','Subject was deleted successfully...!');
            return redirect("/Results/".$sem);
        }
        return abort(404,'Page Not Found');
    }
}
