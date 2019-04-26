<?php
// Start the session
// session_start();

// $user_check=$_SESSION['id'];
// if(!isset($user_check))
// {
//     header('Location:../index.php'); // Redirecting To Home Page
// }

//Array of all courses in finance table
$Courses = array( 
    array(
        "COURSE_CODE" => "CS111"
    ),
    array(
        "COURSE_CODE" => "CS112"
    ));//test array 
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="csv_upload.php" >Programme Upload</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="report.php" style="color: white!important;">Finance Report</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="prog-title">
        <h2>Finance Report</h2>
        <p>You can generate and download finance reports here. You can create a report by either Course Code, Faculty or by Date.</p>
    </div>

    <div class="report-box">
        <!-- <form action="PLACE PATH TO SEND VALUE(SELECTED COURSE CODE FOR RE-CHECK)" method="POST" class="form-inline">-->
            <label for="course" style="margin-left: 15%;">Select A Course:</label>
            <select name="course" class="report-dropdown">
                <option value="" disabled selected>Select Course</option>
                <?php
                    foreach($Courses as $row){
                ?>
                    <option value="<?php echo $row["COURSE_CODE"] ?>" ><?php echo $row["COURSE_CODE"] ?></option>
                <?php
                    }
                ?>
            </select> 
            <label for="faculty" style="margin-left: 5%;">Select A Faculty:</label>
            <select name="faculty" class="report-dropdown">
                <option value="" disabled selected>Select Faculty</option>
                <option value="FSTE">FSTE</option>
                <option value="FBE">FBE</option>
                <option value="FALE">FALE</option>
                <option value="TAFE">TAFE</option>
            </select>
            <br />

            <label for="report_startDate" style="margin-left: 23%;">From:</label>
            <input type="text" name="report_startDate"  id="date_start"/>

            <label for="report_endDate">To:</label>
            <input type="text" name="report_endDate" id="date_end"/>
            <input class="button-select" type="submit" value="Submit" name="submit_report">
        </form>
    </div>

    <script>
        $('input[name="report_startDate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
        $('input[name="report_endDate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
    </script>

</body>
</html>