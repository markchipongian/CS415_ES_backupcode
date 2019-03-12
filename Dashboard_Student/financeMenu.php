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
                <li class="nav-item">
                    <a class="nav-link" href="registrations.php">Registrations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grades.php">Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="programAudit.php">Program Audit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="prerequisites.php">Prerequisites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="financeMenu.php">Finance Menu</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="Container">

        <div class="page-title">
            <h1>Financial Menu</h1>
            <p>Your invoice for the current semester will be displayed below.</p>
        </div>

        <div class="fee">
            <table class="table table-striped">
                <div class="table responsive">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Semester</th>
                            <th>Course Fee</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = $student->student_fee($student_id);
                            $fees = array();
                            foreach($result as $row){
                                echo "<tr>
                                          <td> ". $row["COURSE_CODE"] ."</td>
                                           <td> ". $row["COURSE_NAME"] ."</td>
                                           <td> ". $row["SEMESTER"] ."</td>
                                           <td> <div style ='font-weight: bold; color: red;'>". $row["FEE"] ."</div></td>";
                                           $fees[] = $row["FEE"];
                                echo	'</tr>';
                            }if(!empty($result)){
                                echo "<tr><td></td>";
                                echo "<td></td>";
                                echo "<td><div style ='font-weight: bold'> TOTAL FEES</div</td>";
                                echo "<td><div style ='font-weight: bold; color: red;'> ". array_sum($fees)."</div></td></tr>";
                            }
                        ?>
                    </tbody>
                </div>    
            </table>
        </div>

    </div>

</body>
</html>