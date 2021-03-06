<?php
// Start the session
 session_start();

$user_check=$_SESSION['id'];
if(!isset($user_check))
{
    header('Location:../index.php'); // Redirecting To Home Page
}


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
                        <a class="nav-link active" href="hdr.php">HDR Progress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hdr_programAudit.php">HDR Audit</a>
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
            <h1>HDR Academic History</h1>
            <p>
                In this page you will view your your submitted publications as well as feedback
            </p>
        </div>

        <div class="grades">
            <table class="table table-striped">
                <div class="table responsive">
                    <thead>
                        <tr>
                            <th>Submission</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $student_det = array('username' => $_SESSION["id"]);
                            $data = json_encode($student_det);
                            $hdr_comments = json_decode(APICall($data,'hdr_comments'), true);
                         if(!empty($hdr_comments))
                         {
                            $size = count($hdr_comments);
                         }
                         else
                         {
                             $size = 0;
                         }

                            for($i = 0; $i < $size ; $i++){
                                echo "<tr>
                                          <td> ". $hdr_comments[$i]['COMMENT_TYPE'] ."</td>
                                           <td> ". $hdr_comments[$i]['COMMENTS'] ."</td>";
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