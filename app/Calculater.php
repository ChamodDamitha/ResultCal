<?php
/**
 * Created by PhpStorm.
 * User: Chamod
 * Date: 8/12/2016
 * Time: 8:45 PM
 */

namespace App;


class Calculater
{
    private static function calValue($grade)
    {
        if($grade=="A+" || $grade=="a+")
        {
            return 4.2;
        }
        if($grade=="A" || $grade=="a")
        {
            return 4.0;
        }
        if($grade=="A-" || $grade=="a-")
        {
            return 3.7;
        }
        if($grade=="B+" || $grade=="b+")
        {
            return 3.3;
        }
        if($grade=="B" || $grade=="b")
        {
            return 3.0;
        }
        if($grade=="B-" || $grade=="b-")
        {
            return 2.7;
        }
        if($grade=="C+" || $grade=="c+")
        {
            return 2.3;
        }
        if($grade=="C" || $grade=="c")
        {
            return 2.0;
        }
        if($grade=="C-" || $grade=="c-")
        {
            return 1.7;
        }
        if($grade=="D+" || $grade=="d+")
        {
            return 1.3;
        }
        if($grade=="D" || $grade=="d")
        {
            return 1.0;
        }
        if($grade=="D-" || $grade=="d-")
        {
            return 0.5;
        }
        if($grade=="F" || $grade=="f" || $grade=="I-we")
        {
            return 0.0;
        }

    }


    private static function calSemesterTotalVal($semester)
    {
        $totalVal=0;
        foreach($semester->subjects as $subject)
        {

            if($subject->grade!="Not Released")
            {
                $totalVal+=($subject->credit*(Calculater::calValue($subject->grade)));
            }
        }

        return $totalVal;
    }
    private static function calSemesterTotalCredit($semester)
    {
        $totalCredit=0;
        foreach($semester->subjects as $subject)
        {

            if($subject->grade!="Not Released")
                $totalCredit+=$subject->credit;
        }

        return $totalCredit;
    }
    private static function calStudentTotalVal($student)
    {
        $totalVal=0;
        foreach($student->semesters as $semester)
        {
            $totalVal+=Calculater::calSemesterTotalVal($semester);
        }
        return $totalVal;
    }

    private static function calStudentTotalCredit($student)
    {
        $totalCredit=0;
        foreach($student->semesters as $semester)
        {

            $totalCredit+=(Calculater::calSemesterTotalCredit($semester));
        }
        return $totalCredit;
    }

    public static function calSemesterGPA($semester)
    {
        $totCredit=(Calculater::calSemesterTotalCredit($semester));
        if($totCredit!=0)
        {
            return round(((Calculater::calSemesterTotalVal($semester))/$totCredit),4);
        }
        return 0;
    }

    public static function calStudentGPA($student)
    {
        $totCredit=(Calculater::calStudentTotalCredit($student));

        if($totCredit!=0)
            return round(((Calculater::calStudentTotalVal($student))/$totCredit),4);
        return 0;
    }
}