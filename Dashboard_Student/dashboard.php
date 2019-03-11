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

$details = $student->student_details($student_id);
$gpa = $student->student_gpa($student_id);
foreach($details as $row){
    $fname = $row["First_Name"];
    $lname = $row["Last_Name"];
    $oname = $row["Other_Name"];
    $email = $row["Email"];
    $mobile = $row["Phone_Number"];
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    // $("#slideshow > div:gt(3)").hide();

    //     setInterval(function() {
    //     $('#slideshow > div:first')
    //         .fadeOut(1000)
    //         .next()
    //         .fadeIn(1000)
    //         .end()
    //         .appendTo('#slideshow');
    //     }, 2000);

    var i = 0; 			// Start Point
    var images = [];	// Images Array
    var time = 3000;	// Time Between Switch
        
    // Image List
    images[0] = "../images/profile_pic.png";
    images[1] = "../images/1.jpg";
    images[2] = "../images/2.jpg";

    // Change Image
    function changeImg(){
        document.slide.src = images[i];

        // Check If Index Is Under Max
        if(i < images.length - 1){
        // Add 1 to Index
        i++; 
        } else { 
            // Reset Back To O
            i = 0;
        }

        // Run function every x seconds
        setTimeout("changeImg()", time);
    }

    // Run function when page loads
    window.onload=changeImg;

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
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Home</a>
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
            <h1>Welcome To Your Dashboard</h1>
            <p>This is your homepage and the root of the entire website, you can navigate to other pages from here.</p>
        </div>
        <div class="details">
            <div id="slideshow">
                <img name="slide" style="width:100%;">
            </div>

            <div class="caption">
                <p>
                    First Name:<br />
                    Last Name:<br />
                    Other Name:<br />
                    Student ID:<br />
                    Email:<br />
                    Mobile:<br />
                    GPA:<br />
                </p>
            </div>

            <div class="caption_detials">
                 <p>
                    <?php echo $fname; ?><br />
                    <?php echo $lname; ?><br />
                    <?php 
                        if(empty($oname)){
                            echo "--";
                        }else{
                            echo $oname; 
                        }
                    ?><br />
                    <?php echo $student_id; ?><br />
                    <?php echo $email; ?><br />
                    <?php echo $mobile; ?><br />
                    <?php echo $gpa; ?><br />
                </p>
            </div>
        </div>
        
    </div>


</body>
</html>