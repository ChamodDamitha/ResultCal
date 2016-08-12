@extends('Master')

@section('main_content')
    <script type="text/javascript" src="{!! asset('JS/SubjectValidation.js') !!}"></script>

    <div id="subjectDetails" class="container bg-success">
        <h4>Edit Subject</h4>

        <label>Semester</label></br></br>

        <form id="editSubjectForm" method="post" action="/{{'Semester'.$sem_no}}/EditSubject/{{$subject->subjectname}}" >
            @include('SubjectForm',['new'=>false,'subject'=>$subject])
        </form>
    </div>
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

@stop