<?php
    if(Request::old('credit')!=null){
        $subject=new App\Subject();
        $subject->subjectname=Request::old('subjectname');
        $subject->modulecode=Request::old('modulecode');
        $subject->credit=Request::old('credit');
        $subject->grade=Request::old('grade');
        $new=false;
    }
?>

<div>SubjectName:</div>
<input class="form-control" type="text" id="subjectname" name="subjectname"
       onblur="checkSubjectName('@if(!$new){{$subject->subjectname}}@else {!! "" !!}@endif')" value="@if(!$new){{$subject->subjectname}}@endif"
>
<span id="subjectNameStatus"></span>

<div>Module code:</div>
<input class="form-control" type="text" id="modulecode" name="modulecode" value="@if(!$new){{$subject->modulecode}}@endif">

<div>Credit:</div>
<select class="form-control" id="credit" name="credit">
    @for($i=0.5 ; $i<=4.0 ; $i+=0.5)
        <option value="{{$i}}" @if(!$new && $subject->credit==$i){{ 'selected="selected"' }}@endif>{{$i}}</option>
    @endfor

</select>

<div>Grade:</div>
<select class="form-control" id="grade" name="grade">
    <?php $grades=["Not Released","A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","F","I-we"] ?>
    @foreach($grades as $grade)
        <option value="{{$grade}}" @if(!$new && $subject->grade==$grade){{ 'selected="selected"' }}@endif>{{$grade}}</option>
    @endforeach
</select>
</br></br>

<button type="submit" class="btn btn-success" id="btnAddSubject" > OK</button>

<button class="btn btn-primary" id="btnBack" onclick="btnBackClicked()">Back To Results</button>
</br>
</br>
<span id="status"></span>
<input type="hidden" name="_token" value="{{Session::token()}}">