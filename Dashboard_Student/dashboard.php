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

$fname = $_SESSION["First_Name"];
$lname =  $_SESSION["Last_Name"];
$oname = $_SESSION["Other_Name"];
$email = $_SESSION["Email"];
$mobile = $_SESSION["Phone_Number"];
$Prog_Name = $_SESSION["Prog_Name"];
$gpa ="";

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
        var slideIndex = 3;
        showSlides(slideIndex);
        n = 3;
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
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
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <?php if($_SESSION["Prog_Name"] != "HDR"){?>
                    <li class="nav-item">
                        <a class="nav-link" href="registrations.php">Registrations</a>
                    </li>
                <?php }?>
                <?php if($_SESSION["Prog_Name"] != "HDR"){?>
                    <li class="nav-item">
                        <a class="nav-link" href="grades.php">Grades</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="hdr.php">HDR Progress</a>
                    </li>
                <?php } ?>
                <?php if($_SESSION["Prog_Name"] != "HDR"){?>
                    <li class="nav-item">
                        <a class="nav-link" href="programAudit.php">Program Audit</a>
                    </li>
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="hdr_programAudit.php">HDR Audit</a>
                    </li>
                <?php } ?>
                <?php if($_SESSION["Prog_Name"] != "HDR"){?>
                    <li class="nav-item">
                        <a class="nav-link" href="prerequisites.php">Prerequisites</a>
                    </li>
                <?php }?>
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
    <?php
            if(isset($_SESSION['alert'])){
                $message = $_SESSION['alert'];
                echo $message;
                unset($_SESSION['alert']);
            }
        ?>

        <div class="page-title">
            <h1>Welcome To Your Dashboard</h1>
            <p>This is your homepage and the root of the entire website, you can navigate to other pages from here.</p>
        </div>
        <div class="details">
            <!-- <div id="slideshow">
                <img name="slide" style="width:100%;">
            </div> -->
           
            <div id="slideshow">
                <div class="mySlides" style = "display: block;">
                    <div  class="numbertext">1 / 3</div>
                    <img src="../images/1.jpg" style=" width:100%; height: 100%;">
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img src="../images/2.jpg" style="width:100%; height:100%; ">
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img src="../images/profile_pic.png" style="width:100%; height: 100%;">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div class="caption">
                <p>
                    First Name:<br />
                    Last Name:<br />
                    Other Name:<br />
                    Student ID:<br />
                    Email:<br />
                    Mobile:<br />
                    Programme:<br />
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
                    <?php echo $Prog_Name; ?><br />
                </p>
            </div>
        </div>
        
    </div>


</body>
</html>