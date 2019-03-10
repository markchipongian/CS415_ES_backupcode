<?php
require_once("../Class/Student.php");

$student = new Student();
$student_id = "S111";

$result = $student->student_preqs($student_id);

$array_course_1 = array();
$array_course_2 = array();
$array_course_3 = array();
$array_course_4 = array();



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
$arraysize1 = sizeof($array_course_1);
$arraysize2 = sizeof($array_course_2);
$arraysize3 = sizeof($array_course_3);
$arraysize4 = sizeof($array_course_4);

for($i = 0 ; $i < $arraysize1; $i++){
    for($k = 0 ; $k < $arraysize1; $k++){
        echo $array_course_1[$i][$k];
        
    }
    echo "   ";
}
echo "<br>";
echo "<br>";
echo "<br>";
for($i = 0 ; $i < $arraysize2; $i++){
    for($k = 0 ; $k < $arraysize2; $k++){
        echo $array_course_2[$i][$k];
        
    }
    echo "   ";
}

echo "<br>";
echo "<br>";
echo "<br>";
for($i = 0 ; $i < $arraysize3; $i++){
    for($k = 0 ; $k < $arraysize3; $k++){
        echo $array_course_3[$i][$k];
        
    }
    echo "   ";
}

echo "<br>";
echo "<br>";
echo "<br>";
for($i = 0 ; $i < $arraysize4; $i++){
    for($k = 0 ; $k < $arraysize4; $k++){
        echo $array_course_4[$i][$k];
        
    }
    echo "   ";
}
?>