<?php 

// echo "WEB HANDLER";
require_once("../Auth/web_authservice.php"); ?>
<?php 
    // Start the session
    
    session_start();

    if(isset($_POST['login']))
    {
       // $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Username or Password</div>";
        $type = 'login';
        $id = $_POST['username'];
        $password = $_POST['password'];
        $login_cred = array('username' => $id, 'password' => $password);
        $data = json_encode($login_cred);
        $result = APICall($data,$type); //result is [{"ID":"S111","GENDER":"Male","First_Name":"Patrick","Other_Name":null,"Last_Name":"Chip","S_Password":"$2y$10$J0kI0qQrvARyUlBD7T37GOOKCmiWzmpxvA0Z30CCCkDBCacss/OoS","Email":"Chip","Phone_Number":"+679 9790321","Student_Hold":"0"}]
        $responseData = json_decode($result,true);
        if ($result == 'null')
        {
            // echo $result;
            $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Login Credentials</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../index.php");
        }
        else if($responseData == 'hold')
        {
            // echo $responseData;
            $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account is currently on Hold</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../index.php");
        }
        else
        {
            if(!substr_compare($responseData[0]['ID'], "S", 0, 1)){
                //echo $responseData[0]['GENDER'];
                $_SESSION["id"] = $responseData[0]['ID'];
                $_SESSION["First_Name"] = $responseData[0]['First_Name'];
                $_SESSION["Other_Name"] = $responseData[0]['Other_Name'];
                $_SESSION["Last_Name"] = $responseData[0]['Last_Name'];
                $_SESSION["GENDER"] = $responseData[0]['GENDER'];
                $_SESSION["Email"] = $responseData[0]['Email'];
                $_SESSION["Phone_Number"] = $responseData[0]['Phone_Number'];
                header("location: ../Dashboard_Student/dashboard.php");
            }else if(!substr_compare($responseData[0]['ID'], "H", 0, 1)){
                //echo $responseData[0]['GENDER'];
                $_SESSION["id"] = $responseData[0]['ID'];
                $_SESSION["First_Name"] = $responseData[0]['First_Name'];
                $_SESSION["Other_Name"] = $responseData[0]['Other_Name'];
                $_SESSION["Last_Name"] = $responseData[0]['Last_Name'];
                $_SESSION["GENDER"] = $responseData[0]['GENDER'];
                $_SESSION["Email"] = $responseData[0]['Email'];
                $_SESSION["Phone_Number"] = $responseData[0]['Phone_Number'];
                header("location: ../Dashboard_Manager/dashboard.php");
            }else{
                $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account does not Exist</div>";
                $_SESSION['alert'] = $alertmsgg;
                header("location: ../index.php");
            }
            
        }
    }
    else if(isset($_POST['select_prog']))
    {
       // $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Username or Password</div>";
        $type = 'select_prog';
        $prog_name = $_POST['prog'];
        // $password = $_POST['password'];
        $cred = array('username' => $_SESSION["id"], 'prog_name' => $prog_name);
        $data = json_encode($cred);
        $result = APICall($data,$type); //result is [{"ID":"S111","GENDER":"Male","First_Name":"Patrick","Other_Name":null,"Last_Name":"Chip","S_Password":"$2y$10$J0kI0qQrvARyUlBD7T37GOOKCmiWzmpxvA0Z30CCCkDBCacss/OoS","Email":"Chip","Phone_Number":"+679 9790321","Student_Hold":"0"}]
        if($result == 'true')
        {
            $alertmsgg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Programme Successfully Changed</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Student/programAudit.php");
        }else{
            header("location: ../Dashboard_Student/programAudit.php");
        }
        //$responseData = json_decode($result,true);
        //echo $responseData;
    }
    else if(isset($_POST['grade_recheck']))
    { 
       // $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Username or Password</div>";
        $type = 'grade_recheck';
        $course_code = $_POST['selected_course'];
        $cred = array('username' => $_SESSION["id"], 'course_code' => $course_code);
        $data = json_encode($cred);
        $result = APICall($data,$type); 

         if($result == 'true')
        {
            // echo "PASSED";
            $alertmsgg = "<div class='alert alert-success' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Grade Successfully Changed</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Student/grades.php");
         }else{
            //  echo "FAILED";
            $alertmsgg = "<div class='alert alert-danger' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed to Change Grade</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Student/grades.php");
         }
        //$responseData = json_decode($result,true);
        //echo $responseData;
    }
   else if(isset($_POST['update_grade']))
    { 
       // $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Username or Password</div>";
        $type = 'update_grade';
        $student_id = $_POST['selected_id'];
        $grade = $_POST['grade'];
        $course = $_POST['selected_course'];

        $cred = array('username' => $student_id, 'course_code' => $course, 'grade'=> $grade);
        $data = json_encode($cred);
        $result = APICall($data,$type); 

         if($result == 'true')
        {
            // echo "PASSED";
            // $alertmsgg = "<div class='alert alert-success' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Grade Successfully Changed</div>";
            // $_SESSION['alert'] = $alertmsgg;
            // header("location: ../Dashboard_Student/grades.php");
         }
         else
         {
            //  echo "FAILED";
            // $alertmsgg = "<div class='alert alert-danger' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed to Change Grade</div>";
            // $_SESSION['alert'] = $alertmsgg;
            // header("location: ../Dashboard_Student/grades.php");
         }
        //$responseData = json_decode($result,true);
        //echo $responseData;
    }
    else
    {
        echo "temp error message on web_handler";
    }
    ?>