<?php
require_once("../Class/Student.php");

$student = new Student();
$student_id = "S111";

$result = $student->student_preqs($student_id);

$array_course_1 = array();
$array_course_2 = array();
$array_course_3 = array();
$array_course_4 = array();
$array_final = array();


foreach($result as $row)
{
    $value = substr($row["value"],2, 3);

    if(($value >= 100) && ($value  < 200))
    {
        $array_course_1[] = array($row["value"], $row["COURSE_CODE_COMP"], $row["COURSE_CODE_ALT"], $row["COURSE_CODE_ALTb"], $row["COURSE_CODE_ALTc"], $row["COURSE_CODE_COMP_2"], $row["COURSE_CODE_ALT_2"], $row["COURSE_CODE_ALT_2b"], $row["COURSE_CODE_ALT_2c"], $row["COURSE_CODE_COMP_3"], $row["COURSE_CODE_ALT_3"], $row["COURSE_CODE_COMP_4"], $row["COURSE_CODE_ALT_4"], $row["COURSE_CODE_COMP_5"], $row["COURSE_CODE_ALT_5"], $row["COURSE_CODE_COMP_6"], $row["COURSE_CODE_ALT_6"]);
    }
    if(($value >= 200) && ($value  < 300))
    {
        $array_course_2[] = array($row["value"], $row["COURSE_CODE_COMP"], $row["COURSE_CODE_ALT"], $row["COURSE_CODE_ALTb"], $row["COURSE_CODE_ALTc"], $row["COURSE_CODE_COMP_2"], $row["COURSE_CODE_ALT_2"], $row["COURSE_CODE_ALT_2b"], $row["COURSE_CODE_ALT_2c"], $row["COURSE_CODE_COMP_3"], $row["COURSE_CODE_ALT_3"], $row["COURSE_CODE_COMP_4"], $row["COURSE_CODE_ALT_4"], $row["COURSE_CODE_COMP_5"], $row["COURSE_CODE_ALT_5"], $row["COURSE_CODE_COMP_6"], $row["COURSE_CODE_ALT_6"]);
    }
    if(($value >= 300) && ($value  < 400))
    {
        $array_course_3[] = array($row["value"], $row["COURSE_CODE_COMP"], $row["COURSE_CODE_ALT"], $row["COURSE_CODE_ALTb"], $row["COURSE_CODE_ALTc"], $row["COURSE_CODE_COMP_2"], $row["COURSE_CODE_ALT_2"], $row["COURSE_CODE_ALT_2b"], $row["COURSE_CODE_ALT_2c"], $row["COURSE_CODE_COMP_3"], $row["COURSE_CODE_ALT_3"], $row["COURSE_CODE_COMP_4"], $row["COURSE_CODE_ALT_4"], $row["COURSE_CODE_COMP_5"], $row["COURSE_CODE_ALT_5"], $row["COURSE_CODE_COMP_6"], $row["COURSE_CODE_ALT_6"]);
    }
    if(($value >= 400) && ($value  < 500))
    {
        $array_course_4[] = array($row["value"], $row["COURSE_CODE_COMP"], $row["COURSE_CODE_ALT"], $row["COURSE_CODE_ALTb"], $row["COURSE_CODE_ALTc"], $row["COURSE_CODE_COMP_2"], $row["COURSE_CODE_ALT_2"], $row["COURSE_CODE_ALT_2b"], $row["COURSE_CODE_ALT_2c"], $row["COURSE_CODE_COMP_3"], $row["COURSE_CODE_ALT_3"], $row["COURSE_CODE_COMP_4"], $row["COURSE_CODE_ALT_4"], $row["COURSE_CODE_COMP_5"], $row["COURSE_CODE_ALT_5"], $row["COURSE_CODE_COMP_6"], $row["COURSE_CODE_ALT_6"]);
    }
}


print_r($array_course_1);

foreach($array_course_1 as $values){



} 
?>