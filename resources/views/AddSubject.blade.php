@extends('Master')

@section('main_content')
    <script type="text/javascript" src="{!! asset('JS/SubjectValidation.js') !!}"></script>

    <div id="subjectDetails" class="container bg-success">
        <h4>Add New Subject</h4>

        <label>{{'Semester '.$sem_no}}</label></br></br>

        <form id="addSubjectForm" method="post" action="/{{'Semester'.$sem_no}}/AddSubject">
            @include('SubjectForm',['new'=>true])
        </form>
        @if(count($errors)>0)
            <div class="container alert alert-danger" id="status">
                <div class="col-md-6 col-md-offset-1">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

@stop