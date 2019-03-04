<?php require_once("../Class/Student.php"); ?>
<?php require_once("../Class/Staff.php"); ?>
<?php
// Start the session
session_start();
?>
<?php
    // if (isset($_SERVER['HTTP_ORIGIN'])) {
    //     header("Access-Control-Allow-Origin: *");
    //     header('Access-Control-Allow-Credentials: true');
    //     header('Access-Control-Max-Age: 86400');    // cache for 1 day
    // }
    // // Access-Control headers are received during OPTIONS requests
    // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    
    // if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    //     header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    
    // if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    //     header("Access-Control-Allow-Headers: 
    //     {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    // }
    
    // $postdata = file_get_contents("php://input");
    // if (isset($postdata)) {
    //     $request = json_decode($postdata, TRUE);
    //     $username = $request->username;
    //     echo $username;
    // }
    // else {
    //     echo "Error";
    // }

    if(isset($_POST['submit']))
    {
        $id = $_POST['username'];
        $password = $_POST['password'];
        echo $id;
        echo substr($id, 0, 1);
        echo substr_compare($id, "S", 0, 1);
        if(!substr_compare($id, "S", 0, 1))
        {
            echo "A";
            $student = new Student();
            $result = $student->login($id, $password);

            if($result)
            {
                echo $_SESSION["id"] = $id;
               header("location: ../Dashboard_Student/dashboard.php");
            }
            else
            {
                header("location: ../index.php");
            }
        }
        elseif(!substr_compare($id, "H", 0, 1))
        {
            echo "B";
            $staff = new Staff();
            $result = $staff->login($id, $password);

            if($result == "Manager")
            {
                $_SESSION["id"] = $id;
                header("location: ../Dashboard_Student/dashboard.php");
            }
            elseif($result == "Academic")
            {
                $_SESSION["id"] = $id;
                header("location: ../Dashboard_Student/dashboard.php");
            }
            else
            {
                header("location: ../index.php");
            }
        }
        else
        {
            echo "C";
        }
    }




?> 