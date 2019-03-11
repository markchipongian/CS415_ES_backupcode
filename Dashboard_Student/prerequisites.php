<?php require_once("../Class/Student.php"); ?>
<?php
// Start the session
session_start();

$user_check=$_SESSION['id'];
if(!isset($user_check))
{
    header('Location:../index.php'); // Redirecting To Home Page
}


$student = new Student();
$student_id = $_SESSION["id"];

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
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="Container">
        <div class="page-title">
            <h1>Prerequisites</h1>
            <p>This table  shows the courses and thier prerequisites for your programme</p>
        </div>

        <div class="legend">
            <img src="../images/legend.png" style="width:100%; height:100%;">
        </div>

        <div class="preq">
            <?php if(!empty($array_course_1)){ ?>
                <div class="courses-title">
                    <h1>100 Level Courses</h1>
                </div>
                <div class="level">
                    <?php for($i = 0 ; $i < $arraysize1; $i++){ ?>
                        <div class="course">
                            <div class="course-code">
                                <?php echo $array_course_1[$i][0]; ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][1]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][2]; 
                                echo $array_course_1[$i][3]; 
                                echo $array_course_1[$i][4]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][5]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][6]; 
                                echo $array_course_1[$i][7]; 
                                echo $array_course_1[$i][8]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][9]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][10]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][11]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][12]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][13]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][14]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_1[$i][15]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_1[$i][16]; 
                                ?>
                            </div>
                         </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if(!empty($array_course_2)){ ?>
                <div class="courses-title">
                    <h1>200 Level Courses</h1>
                </div>
                <div class="level">
                    <?php for($i = 0 ; $i < $arraysize2; $i++){ ?>
                        <div class="course">
                            <div class="course-code">
                                <?php echo $array_course_2[$i][0]; ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][1]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][2]; 
                                echo $array_course_2[$i][3]; 
                                echo $array_course_2[$i][4]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][5]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][6]; 
                                echo $array_course_2[$i][7]; 
                                echo $array_course_2[$i][8]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][9]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][10]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][11]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][12]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][13]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][14]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_2[$i][15]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_2[$i][16]; 
                                ?>
                            </div>
                         </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if(!empty($array_course_3)){ ?>
                <div class="courses-title">
                    <h1>300 Level Courses</h1>
                </div>
                <div class="level">
                    <?php for($i = 0 ; $i < $arraysize3; $i++){ ?>
                        <div class="course">
                            <div class="course-code">
                                <?php echo $array_course_3[$i][0]; ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][1]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][2]; 
                                echo $array_course_3[$i][3]; 
                                echo $array_course_3[$i][4]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][5]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][6]; 
                                echo $array_course_3[$i][7]; 
                                echo $array_course_3[$i][8]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][9]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][10]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][11]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][12]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][13]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][14]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_3[$i][15]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_3[$i][16]; 
                                ?>
                            </div>
                         </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if(!empty($array_course_4)){ ?>
                <div class="courses-title">
                    <h1>400 Level Courses</h1>
                </div>
                <div class="level">
                    <?php for($i = 0 ; $i < $arraysize4; $i++){ ?>
                        <div class="course">
                            <div class="course-code">
                                <?php echo $array_course_4[$i][0]; ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][1]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][2]; 
                                echo $array_course_4[$i][3]; 
                                echo $array_course_4[$i][4]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][5]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][6]; 
                                echo $array_course_4[$i][7]; 
                                echo $array_course_4[$i][8]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][9]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][10]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][11]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][12]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][13]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][14]; 
                                ?>
                            </div>
                            <div class="course-and">
                                <?php echo $array_course_4[$i][15]; ?>
                            </div>
                            <div class="course-alt">
                                <?php 
                                echo $array_course_4[$i][16]; 
                                ?>
                            </div>
                         </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

    </div>
</body>
</html>






<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!OLD CODE DONT USE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<!-- <?php for($k = 1 ; $k < $arraysize3; $k++){
                                    
                        } ?> -->

                        
<!-- <?php if(!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && empty($array_course_3[$i][4]) && empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//only one preq ?> 
                                        <div class="course-alt">
                                            <?php echo $array_course_3[$i][0]; ?>
                                         </div>
                                    <?php }else if (!empty($array_course_3[$i][1]) && !empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && empty($array_course_3[$i][4]) && empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//one preq with one alt?>
                                        <div class="course-alt">
                                            <?php echo $array_course_3[$i][1]; ?>
                                        </div>
                                    <?php }else if (!empty($array_course_3[$i][1]) && !empty($array_course_3[$i][2]) && !empty($array_course_3[$i][3]) 
                                    && empty($array_course_3[$i][4]) && empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//one preq with two alt?>
                                        <div class="course-alt">
                                            <?php echo $array_course_3[$i][1]; 
                                                echo " OR ";
                                                echo $array_course_3[$i][2]; 
                                            ?>
                                        </div>
                                    <?php }else if (!empty($array_course_3[$i][1]) && !empty($array_course_3[$i][2]) && !empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//one preq with three alt?>
                                        <div class="course-alt">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " OR ";
                                                echo $array_course_3[$i][2]; 
                                                echo " OR ";
                                                echo $array_course_3[$i][3]; 
                                            ?>
                                        </div>
                                    <?php } else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//two preq with no alt?>
                                            <div class="course-and">
                                            <?php echo $array_course_3[$i][1]; 
                                                    echo " AND ";
                                                    echo $array_course_3[$i][5]; 
                                                ?>
                                            </div>
                                    <?php }  else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && !empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//two preq with one alt?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                            ?>
                                        </div>
                                        <div class="course-alt">
                                        <?php 
                                            echo $array_course_3[$i][6]; 
                                            echo " OR ";
                                            ?>
                                        </div>
                                    <?php }  else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && !empty($array_course_3[$i][6]) && !empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//two preq with two alt?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                            ?>
                                        </div>
                                        <div class="course-alt">
                                        <?php 
                                            echo $array_course_3[$i][6]; 
                                            echo " OR ";
                                            echo $array_course_3[$i][7]; 
                                            ?>
                                        </div>
                                    <?php }  else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && !empty($array_course_3[$i][6]) && !empty($array_course_3[$i][7]) 
                                    && !empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//two preq with three alt?>
                                       <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                            ?>
                                        </div>
                                        <div class="course-alt">
                                        <?php 
                                            echo $array_course_3[$i][6]; 
                                            echo " OR ";
                                            echo $array_course_3[$i][7]; 
                                            echo " OR ";
                                            echo $array_course_3[$i][8]; 
                                            ?>
                                        </div>
                                    <?php }  else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//three preq ?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][9]; 
                                            ?>
                                        </div>
                                    <?php }  else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//four preq ?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][9]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][11]; 
                                            ?>
                                        </div>
                                    <?php } else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//five preq ?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][9]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][11]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][13]; 
                                            ?>
                                        </div>
                                    <?php } else if (!empty($array_course_3[$i][1]) && empty($array_course_3[$i][2]) && empty($array_course_3[$i][3]) 
                                    && !empty($array_course_3[$i][4]) && !empty($array_course_3[$i][5]) && empty($array_course_3[$i][6]) && empty($array_course_3[$i][7]) 
                                    && empty($array_course_3[$i][8]) && empty($array_course_3[$i][9]) && empty($array_course_3[$i][10]) && empty($array_course_3[$i][11])
                                    && empty($array_course_3[$i][12]) && empty($array_course_3[$i][13]) && empty($array_course_3[$i][14]) && empty($array_course_3[$i][15]) 
                                    && empty($array_course_3[$i][16]) ){//six preq ?>
                                        <div class="course-and">
                                        <?php echo $array_course_3[$i][1]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][5]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][9]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][11]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][13]; 
                                                echo " AND ";
                                                echo $array_course_3[$i][15]; 
                                            ?>
                                        </div>
                                    <?php } ?> -->