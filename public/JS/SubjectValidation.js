/**
 * Created by Chamod on 8/11/2016.
 */

var subjectNameCheck=false;
function okBtnClicked(selected_semester,subjectid,currentName)
{
    if(subjectid!=-1)
    {
        checkSubjectName(currentName);
    }
    if(subjectNameCheck)
    {
        var subjectName=document.getElementById("subjectName").value;
        var moduleCode=document.getElementById("moduleCode").value;
        var credit=document.getElementById("credit").value;
        var grade=document.getElementById("grade").value;

        var http=new XMLHttpRequest();
        http.onreadystatechange=function()
        {
            if(http.readyState==4 && http.status==200)
            {
                $response=http.responseText;
                if($response=="Success")
                {
                    $response="<strong style='color:green;'>"+$response+"...!</strong>";
                    clearForm();
                }
                else if($response=="Updated")
                {
                    $response="<strong style='color:green;'>"+$response+"...!</strong>";
                }
                else
                {
                    $response="<strong style='color:red;'>Failed...!</strong>";
                }
                document.getElementById("status").innerHTML=$response;
            }
        };
        http.open("POST","http://localhost/ResultCal/SubjectDetailPageHandler.php");
        http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        if(subjectid==-1)http.send("subjectName="+subjectName+"&moduleCode="+moduleCode+"&credit="+credit+"&grade="+grade+"&selected_semester="+selected_semester);
        else http.send("subjectName="+subjectName+"&moduleCode="+moduleCode+"&credit="+credit+"&grade="+grade+"&selected_semester="+selected_semester+"&subjectid="+subjectid);
    }
    else
    {
        document.getElementById("status").innerHTML="<strong style='color:red'>Please enter mandatory information...!</strong>";
    }
}

function clearForm()
{
    document.getElementById('subjectName').value="";
    document.getElementById('moduleCode').value="";
    document.getElementById('subjectNameStatus').innerText="";
}

function btnBackClicked()
{
    window.location.href="/Results/Semester1";
}

function checkSubjectName(currentName)
{
    var subjectName=document.getElementById('subjectName').value;
    if(subjectName!="")
    {
        if(subjectName==currentName)
        {
            document.getElementById("subjectNameStatus").innerHTML="<strong style='color:green'>OK</strong>";
            subjectNameCheck=true;
        }
        else
        {
            var http=new XMLHttpRequest();
            http.onreadystatechange=function()
            {
                if(http.readyState==4 && http.status==200)
                {
                    if(http.responseText==true)
                    {
                        document.getElementById("subjectNameStatus").innerHTML="<strong style='color:red'>This subject is already available..!</strong>";
                        subjectNameCheck=false;
                    }
                    else{
                        document.getElementById("subjectNameStatus").innerHTML="<strong style='color:green'>OK</strong>";
                        subjectNameCheck=true;
                    }

                }
            };
            http.open("POST","http://localhost/ResultCal/SubjectDetailPageHandler.php");
            http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            http.send("subjectName="+subjectName);
        }
    }
    else
    {
        document.getElementById("subjectNameStatus").innerHTML="<strong style='color:red'>Subject name is mandatory...!</strong>"
        subjectNameCheck=false;
    }
}
