<div>SubjectName:</div>
<input class="form-control" type="text" id="subjectName" name="subjectName"
       onblur="checkSubjectName('@if(!$new){{$subject->subjectname}}@else {!! "" !!}@endif')" value="@if(!$new){{$subject->subjectname}}@endif"
>
<span id="subjectNameStatus"></span>

<div>Module code:</div>
<input class="form-control" type="text" id="moduleCode" name="moduleCode" value="@if(!$new){{$subject->modulecode}}@endif">

<div>Credit:</div>
<select class="form-control" id="credit">
    @for($i=0.5 ; $i<=4.0 ; $i+=0.5)
        <option value="{{$i}}" @if(!$new && $subject->credit==$i){{ 'selected="selected"' }}@endif>{{$i}}</option>
    @endfor

</select>

<div>Grade:</div>
<select class="form-control" id="grade">
    <?php $grades=["Not Released","A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","F","I-we"] ?>
    @foreach($grades as $grade)
        <option value="{{$grade}}" @if(!$new && $subject->grade==$grade){{ 'selected="selected"' }}@endif>{{$grade}}</option>
    @endforeach
</select>
</br></br>

<button class="btn btn-success" id="btnAddSubject" onclick="okBtnClicked()"> OK</button>

<button class="btn btn-primary" id="btnBack" onclick="btnBackClicked()">Back To Results</button>
</br>
</br>
<span id="status"></span>