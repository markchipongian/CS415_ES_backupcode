<?php require_once("../Class/Student.php"); ?>
<?php
// Start the session
session_start();

$student = new Student();
$student_id = $_SESSION["id"];

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


?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="header">
        <img src="../images/usp_logo.jpg" class="logo">
        <div class="title">
            <h2>
                Excellence in Uniquely Pacific <br>Learning and Innovation
            </h2>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" >
            <ul class="nav navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="registrations.php">Registrations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grades.php">Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="programAudit.php">Program Audit</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="prerequisites.php">Prerequisites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="financeMenu.php">Finance Menu</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="Container">
        <div class="page-title">
            <h1>Prerequisites</h1>
            <p>This table  shows the courses and thier prerequisites</p>
        </div>

        <div class="preq">
            <?php if(!empty($array_course_1)){ ?>
                <div class="courses-title">
                    <h1>100 Level Courses</h1>
                </div>
                <div class="level">
                    <?php foreach($array_course_1 as $values){ ?>
                        <div class="course">
                            <?php
                                echo $values[0][0];
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty($array_course_2)){ ?>
                <div class="courses-title">
                    <h1>200 Level Courses</h1>
                </div>
                <div class="level">
                    <?php foreach($array_course_2 as $values){ ?>
                        <div class="course">
                            <?php
                                echo $values;
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty($array_course_3)){ ?>
                <div class="courses-title">
                    <h1>300 Level Courses</h1>
                </div>
                <div class="level">
                    <?php foreach($array_course_3 as $values){ ?>
                        <div class="course">
                            <?php
                                echo $values;
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if(!empty($array_course_4)){ ?>
                <div class="courses-title">
                    <h1>400 Level Courses</h1>
                </div>
                <div class="level">
                    <?php foreach($array_course_4 as $values){ ?>
                        <div class="course">
                            <?php
                                echo $values;
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>

</body>
</html>