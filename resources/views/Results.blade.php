@extends('Master')

@section('main_content')
    <style>
        #studentDetails
        {
            width:50%;
            text-align:center;
            margin:20px auto 0 auto;
            padding:0px;
        }
        table{margin:0 auto;}
        td,th{text-align:left;}
        label {   font-size:18px;  }
    </style>
    <script>
        public:function semesterSelect() {
            var currentSemNo=document.getElementById("selected_semester").value;
            window.location.href='/Results/'+'Semester'+currentSemNo;
        }
        public:function editSubject(i,currentSemNo) {
            var subjectName=document.getElementById("subjectName"+i).innerText;
            window.location.href='/Semester'+currentSemNo+'/EditSubject/'+subjectName;
        }
        public:function addNewSubject(currentSemNo) {
            window.location.href='/Semester'+currentSemNo+'/AddSubject';
        }

        public:function deleteSubject(i,currentSemNo) {
            var subjectName=document.getElementById("subjectName"+i).innerText;
            window.location.href='/Semester'+currentSemNo+'/DeleteSubject/'+subjectName;
        }
    </script>

    <div id="studentDetails" class="container wrapperTrans">

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

            <th colspan="2"><button class="btn btn-success" id="btnAddSubject" onclick="addNewSubject({{$currentSemNo}})">Add New Subject</button></th>

            @for($i=0;$i<count($subjectNames);$i++)
            <tr>

                <td id="{{'subjectName'.$i}}"><?=$subjectNames[$i]?></td>
                <td>{{$moduleCodes[$i]}}</td>
                <td>{{$credits[$i]}}</td>
                <td>{{$grades[$i]}}</td>
                <td><button class="btn btn-warning" onclick="editSubject({{$i.",".$currentSemNo}})">EDIT</button></td>
                <td><button class="btn btn-danger" onclick="deleteSubject({{$i.",".$currentSemNo}})">DEL</button></td>
            </tr>
            @endfor

        </table>

        <label>{{"Semester GPA : ".$semesterGPA}}</label></br>
        <label>{{"Overall GPA : ".$studentGPA}}</label></br>
    </div>
@stop

