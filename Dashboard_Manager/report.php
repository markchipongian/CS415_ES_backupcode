<?php
// Start the session
// session_start();

// $user_check=$_SESSION['id'];
// if(!isset($user_check))
// {
//     header('Location:../index.php'); // Redirecting To Home Page
// }

// FETCH AN Array of all courses in finance table
$Courses = array( 
    array(
        "COURSE_CODE" => "CS111"
    ),
    array(
        "COURSE_CODE" => "CS112"
    ));//test array 

//FETCH AN Array of all programmes in finance table
$Porgrammes = array( 
    array(
        "PROG_CODE" => "BSE"
    ),
    array(
        "PROG_CODE" => "BNC"
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

    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="prog-title">
        <h2>Finance Report</h2>
        <p>You can generate and download finance reports here. You can create a report by either Course Code, Faculty or by Date.</p>
    </div>



    <div class="report-box">
        <form action="../Web_Handler/test.php" method="POST" >
            <!-- <label for="course" style="margin-left: 35%;">By Course:</label>
            <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select report-dropdown" name="course[]">
                <option value="" disabled selected>Select Course</option>
                <?php
                    foreach($Courses as $row){
                ?>
                    <option value="<?php echo $row["COURSE_CODE"] ?>" ><?php echo $row["COURSE_CODE"] ?></option>
                <?php
                    }
                ?>
            </select>  -->

            <!-- <label for="prog" style="margin-left: 5%;">By Program:</label>
            <select name="prog" class="report-dropdown">
                <option value="" disabled selected>Select Program</option>
                    <?php
                        foreach($Porgrammes as $row){
                    ?>
                        <option value="<?php echo $row["PROG_CODE"] ?>" ><?php echo $row["PROG_CODE"] ?></option>
                    <?php
                        }
                    ?>
            </select> -->

            <script>
                $(".chosen-select").chosen({
                    no_results_text: "Oops, nothing found!"
                })
            </script>

            <!-- <br />
            <br /> -->
            <!-- <button type="button" class="btn btn-primary" style="margin-left: 28%;" onclick="byRegistration();">By Registration Date</button>
            <button type="button" class="btn btn-primary" style="margin-left: 5%;" onclick="byYearSem();">By Year And Semester</button> -->
            <!-- <br />
            <br /> -->
                
            <script>
                function byRegistration(){
                    document.getElementById('div1').style.display ='block';
                    document.getElementById('div2').style.display = 'none';
                }
                function byYearSem(){
                    document.getElementById('div1').style.display ='none';
                    document.getElementById('div2').style.display = 'block';
                }
            </script>            

            <div class="by-registration-date">
                <label style="margin-left: 20%;">By Registration Date:</label>
                <br />
                <label for="report_startDate" style="margin-left: 10%;" class="" >From:</label>
                <input placeholder="Date" type="date" name="report_startDate"  id="date_start" />

                <label for="report_endDate" style="margin-left: 5%;">To:</label>
                <input placeholder="Date" type="date" name="report_endDate" id="date_end"/>
            </div>      

            <!-- <div id="div2" class="by-year">    
                <label for="year" >By Year:</label>
                <select name="course" class="report-dropdown">
                    <option value="" disabled selected>Select Year</option>
                    <?php
                        $currentYear = date("Y");
                        $startYear = 1968;
                        for($i = $currentYear;$i >= $startYear; $i--){
                    ?>
                        <option value="<?php echo $i ?>" ><?php echo $i ?></option>
                    <?php
                        }
                    ?>
                </select> 

                <label for="year" style="margin-left: 5%;">By Semester:</label>
                <select name="course" class="report-dropdown">
                    <option value="" disabled selected>Select Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">Both</option>
                </select> 
            </div>       -->
                <!-- <br /> -->
                <br />
                <input class="btn btn-success" style="margin-left: 45%;" type="submit" value="Submit" name="submit_report">
            </form>
    </div>

    <script>
        // $('input[name="report_startDate"]').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        //     minYear: 1901,
        //     maxYear: parseInt(moment().format('YYYY'),10)
        // });

        // $('input[name="report_endDate"]').daterangepicker({
        //     singleDatePicker: true,
        //     showDropdowns: true,
        //     minYear: 1901,
        //     maxYear: parseInt(moment().format('YYYY'),10)
        // });
    </script>

</body>
</html>