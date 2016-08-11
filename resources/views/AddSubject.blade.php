@extends('Master')

@section('main_content')
    <script type="text/javascript" src="{!! asset('JS/SubjectValidation.js') !!}"></script>

    <div id="subjectDetails" class="container bg-success">
        <h4>Add New Subject</h4>

        <label>Semester</label></br></br>

        <form id="addSubjectForm" onsubmit="return false ;" >
            @include('SubjectForm',['new'=>false,'subject'=>$subject])
        </form>

    </div>

@stop