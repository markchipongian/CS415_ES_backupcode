<?php require_once("../Class/Student.php"); ?>
<?php require_once("../Auth/web_authservice.php"); ?>
<?php
// Start the session
session_start();

$user_check=$_SESSION['id'];
if(!isset($user_check))
{
    header('Location:../index.php'); // Redirecting To Home Page
}
?>
<?php
    // // $student = new Student();
    // $student_id = $_SESSION["id"];
    $student_det = array('username' => $_SESSION["id"]);
    $data = json_encode($student_det);
    $student_course_completed = json_decode(APICall($data,'completed_courses'), true);
    $student_course_registered = json_decode(APICall($data,'registered_courses'), true);
    $student_course_left = json_decode(APICall($data,'courses_left'), true);
    $prog_list = json_decode(APICall($data,'prog_lists'), true);
    $array_size = count($prog_list); 
    // $student_course_completed = Count($student->student_course_completed($student_id));
    // $student_course_registered = Count($student->student_course_registered($student_id));
    // $student_course_to_complete = Count($student->student_course_to_complete($student_id));


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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        google.charts.setOnLoadCallback(drawChart);  
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Courses Completed', 'Total Courses'],
            ['Courses Completed',     <?php echo count($student_course_completed) ?>],
            ['Courses Left',      <?php echo  count($student_course_left)?>],
            ['Courses Registered',      <?php echo count($student_course_registered)?>],
            ]);

            var options = {
            title: 'Percentage of Programme Completion'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
            }
    </script>
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
                <li class="nav-item">
                    <a class="nav-link" href="registrations.php">Registrations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grades.php">Grades</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="programAudit.php">Program Audit</a>
                </li>
                <li class="nav-item">
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
            <h1>My Programme Audit</h1>
            <p>Details about your current Program as well as courses and their information will be displayed here.</p>
        </div>

        <?php
                if(isset($_SESSION['alert'])){
                    $message = $_SESSION['alert'];
                    echo $message;
                }
                unset($_SESSION['alert']);
            ?>

        <div class="prog_change_table">
            <h2>Would you Like To Change Your Program?</h2>
            <p>If you wish to change your current programme, the list below contains available programs to change to.</p>

            <form action="../Web_Handler/web_handler.php" method="POST" class="form-inline">
                <select name="prog" class="select-menu">
                <option value="0">--Select Programme--</option>
                <?php
                    for($i = 0; $i < $array_size; $i++) { ?>
                    <option value="<?=  $prog_list[$i][0] ?>"><?php echo $prog_list[$i][0] ?></option>
                <?php } ?>
                </select> <input class="button-select" type="submit" value="Submit" name="select_prog">
            </form>
        </div>

        <div class="courses-title">
            <h1>Programme Summary</h1>
            <p>This Pie-Chart shows a summary of your programme</p>
        </div>

        <div class="pie-chart">
            <div id="piechart" style="width: 100%; height: 100%;"></div>
        </div>

        <div class="courses-title">
            <h1>Courses Completed</h1>
            <p>This table  shows the courses that you have completed</p>
        </div>

        <div class="courses-table">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>COURSE CODES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $courses_compl = $student_course_completed;
                            foreach($courses_compl as $row){

                                echo "<tr>
                                          <td> <div style ='font-weight: bold;'>". $row["COURSE_CODE"] ."</div></td>
                                          <td>";
                                echo	'</td> </tr>';
                            }

                        ?>
                    </tbody>
            </table>
        </div>

        <div class="courses-title">
            <h1>Courses Registered</h1>
            <p>This table  shows the courses that you have registered for</p>
        </div>

        <div class="courses-table">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>COURSE CODES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $courses_reg = $student_course_registered;
                            foreach($courses_reg as $row){

                                echo "<tr>
                                          <td> <div style ='font-weight: bold;'>". $row["COURSE_CODE"] ."</div></td>
                                          <td>";
                                echo	'</td>
                                    </tr>';
                            }if(empty($courses_reg)){
                                echo "<tr><td><div style ='font-weight: bold; color: red;'>You Have Not Registered For Any Course</div></td></tr>";
                            }

                        ?>
                    </tbody>
            </table>
        </div>

        <div class="courses-title">
            <h1>Courses Left To Be Completed</h1>
            <p>This table  shows the courses that you have left</p>
        </div>

        <div class="courses-table">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>COURSE CODES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $courses_left = $student_course_left;
                            foreach($courses_left as $row){

                                echo "<tr>
                                          <td> <div style ='font-weight: bold;'>". $row."</div></td>
                                          <td>";
                                echo	'</td>
                                    </tr>';
                            }
                           
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
</body>
</html>

