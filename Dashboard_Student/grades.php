<?php
// Start the session
 session_start();

// $user_check=$_SESSION['id'];
// if(!isset($user_check))
// {
//     header('Location:../index.php'); // Redirecting To Home Page
// }


?>
<?php require_once("../Class/Student.php"); ?>
<?php require_once("../Auth/web_authservice.php"); ?>
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
                <li class="nav-item active">
                    <a class="nav-link" href="grades.php">Grades</a>
                </li>
                <li class="nav-item">
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
            <h1>Academic History</h1>
            <p>
                In this page you will view your academic grades for units that you have completed.
            </p>
        </div>

        <?php
            if(isset($_SESSION['alert'])){
                $message = $_SESSION['alert'];
                echo $message;
            }
            unset($_SESSION['alert']);
        ?>

        <div class="grades">
            <table class="table table-striped">
                <div class="table responsive">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Grade</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $student_det = array('username' => $_SESSION["id"]);
                         $data = json_encode($student_det);
                         $Grades = json_decode(APICall($data,'course_grades'), true);
                         if(!empty($Grades))
                         {
                            $size = count($Grades);
                         }
                         else
                         {
                             $size = 0;
                         }
                        //  echo $Grades[0][0];
                            //Get Grades into tarray provided here!!
                            // $Grades = array( 
                            //     array(
                            //         "COURSE_CODE" => "CS111",
                            //         "GRADE" => "A+",
                            //         "BOOL" => true
                            //     ),
                            //     array(
                            //         "COURSE_CODE" => "CS112",
                            //         "GRADE" => "valore",
                            //         "BOOL" => false
                            //     ));//test array 

                            //Old Code
                            // $student_id = $_SESSION["id"];
                            // $student = new Student();
                            // $result = $student->student_grades($student_id);

                            for($i = 0; $i < $size ; $i++){
                                echo "<tr>
                                          <td> ". $Grades[$i][0] ."</td>
                                           <td> ". $Grades[$i][1] ."</td>";
                                if($Grades[$i][2]){?>
                                    <form method="POST" action="../Web_Handler/web_handler.php">
                                    <input type="hidden" name="selected_course" value="<?php echo $Grades[$i][0]; ?>"/>

                                    <?php echo "<td> <button type='submit' name = 'grade_recheck' class='btn btn-success'>Re-Check</button></td>";?>
                                    </form>
                                    <?php
                                }else
                                {
                                    echo "<td>No Recheck</td>";
                                }
                                echo	'</tr>';
                            }
                        ?>
                    </tbody>
                </div>    
            </table>
        </div>
    
    </div>


</body>
</html>