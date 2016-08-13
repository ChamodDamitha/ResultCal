@extends('Master')

@section('main_content')
       <div id="subjectDetails" class="container bg-success">
        <h4>Edit Subject</h4>

        <label>Semester</label></br></br>

        <form id="editSubjectForm" method="post" action="/{{'Semester'.$sem_no}}/EditSubject/{{$subject->subjectname}}" >
            @include('SubjectForm',['new'=>false,'subject'=>$subject])
        </form>
    </div>

@stop