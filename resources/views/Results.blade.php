@extends('Master')

@section('main_content')
    <div id="studentDetails" class="container">

        <label id="studentName">{{$studentName}}</label></br>
        <label id="indexNo">{{$studentIndexNo}}</label></br>

        <select class="bg-primary" name="selected_semester" id="selected_semester" onchange="semesterSelect()">
            @for($i=1;$i<=8;$i++)
                <option value={{$i}} @if($currentSemNo==$i){!!"selected='selected'"!!};@endif >{{"Semester ".$i}}</option>
            @endfor
        </select>

        </br></br>

        <table class="table" id="studentDetailsTable" >

            <th>Subject</th>
            <th>Module Code</th>
            <th>Credit</th>
            <th>Grade</th>

            <th colspan="2"><button class="btn btn-success" id="btnAddSubject" onclick="addNewSubject()">Add New Subject</button></th>

            @for($i=0;$i<count($subjectNames);$i++)
            <tr>

                <td id="{{'subjectName'.$i}}"><?=$subjectNames[$i]?></td>
                <td>{{$moduleCodes[$i]}}</td>
                <td>{{$credits[$i]}}</td>
                <td>{{$grades[$i]}}</td>
                <td><button class="btn btn-warning" onclick="editSubject({{$i}})">EDIT</button></td>
                <td><button class="btn btn-danger" onclick="deleteSubject({{$i}})">DEL</button></td>
            </tr>
            @endfor

        </table>

        <label>{{"Semester GPA : ".$semesterGPA}}</label></br>
        <label>{{"Overall GPA : ".$studentGPA}}</label></br>
    </div>
@stop
