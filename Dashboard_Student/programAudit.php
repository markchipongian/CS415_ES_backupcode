<?php require_once("../Class/Student.php"); ?>
<?php
// Start the session
session_start();
?>

<?php
    $student = new Student();
    $student_id = $_SESSION["id"];
    $student_course_completed = Count($student->student_course_completed($student_id));
    $student_course_registered = Count($student->student_course_registered($student_id));
    $student_course_to_complete = $student->student_course_to_complete($student_id);
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
            ['Courses Completed',     <?php echo $student_course_completed ?>],
            ['Courses Left',      <?php echo $student_course_to_complete?>],
            ['Courses Registered',      <?php echo $student_course_registered?>],
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
            <h1>
                Excellence in Uniquely Pacific <br>Learning and Innovation
            </h1>
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
                    <a class="nav-link" href="financeMenu.php">Finance Menu</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    
    <div class="Container">

        <div class="page-title">
            <h1>My Porgram Audit</h1>
            <p>Details about your current Program as well as courses and their information will be displayed here.</p>
        </div>

        <div class="pie-chart" id="piechart">
        </div>

    </div>

</body>
</html>