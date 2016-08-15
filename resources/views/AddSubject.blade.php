@extends('Master')

@section('main_content')
    <div id="subjectDetails"  class="wrapperTrans">
        <h4>Add New Subject</h4>

        <label>{{'Semester '.$sem_no}}</label></br></br>

        <form id="addSubjectForm" method="post" action="/{{'Semester'.$sem_no}}/AddSubject">
            @include('SubjectForm',['new'=>true])
        </form>

    </div>

@stop