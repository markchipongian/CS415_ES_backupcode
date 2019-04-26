<?php
// Start the session
// session_start();

// $user_check=$_SESSION['id'];
// if(!isset($user_check))
// {
//     header('Location:../index.php'); // Redirecting To Home Page
// }

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
                <li class="nav-item active" > 
                    <a class="nav-link" href="dashboard.php" style="color: white!important;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="csv_upload.php">Programme Upload</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="report.php">Finance Report</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="Container">
        <div class="pendngGrades-title">
            <h1>Welcome Admin!</h1>
            <br/>
            <h2>Pending Grade Rechecks</h2>
            <p>Grades that are requested to be rechecked are posted here</p>
        </div>

        <div class="pendngGrades-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>COURSE CODE</th>
                        <th>CURRENT GRADE</th>
                        <th>OPTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Get Pendgin Grades into tarray provided here!!
                        $pendingGrades = array( 
                        array(
                            "ID" => "S111",
                            "COURSE_CODE" => "CS111",
                            "GRADE" => "B+"
                        ),
                        array(
                            "ID" => "S112",
                            "COURSE_CODE" => "CS111",
                            "GRADE" => "D"
                        ),
                        array(
                            "ID" => "S112",
                            "COURSE_CODE" => "CS111",
                            "GRADE" => "E"
                        ));//test array 

                        foreach($pendingGrades as $row){

                            echo "<tr>
                                    <td> <div style ='font-weight: bold;'>". $row["ID"] ."</div></td>
                                    <td> <div style ='font-weight: bold;'>". $row["COURSE_CODE"] ."</div></td>
                                    <td> <div style ='font-weight: bold;'>". $row["GRADE"] ."</div></td>";
                            echo "<td>";?>
                             <!-- <form action="PLACE PATH TO SEND VALUE(SELECTED COURSE CODE FOR RE-CHECK)" method="POST" class="form-inline">-->
                                <select name="grade" class="select-menu">
                                    <option value="Unchanged">Select Grade</option>
                                    <option value="A+">A+</option>
                                    <option value="A">A</option>
                                    <option value="B+">B+</option>
                                    <option value="B">B</option>
                                    <option value="C+">C+</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="Unchanged">Unchanged</option>
                                </select> <input class="button-select" type="submit" value="Submit" name="select_grade">
                            </form>
                            <?php echo "</td><td>";
                            echo	'</td> </tr>';
                        }

                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>