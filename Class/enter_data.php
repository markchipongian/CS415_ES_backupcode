<?php require_once("DBConn.php"); ?>

<?php

    function password_encryption($pass){
        $password = password_hash($pass, PASSWORD_BCRYPT);
        return $password;
    }

    try
    {
        $s_id = "H111";
        $role = "Manager";
        //Create instance of Database Connection
        $conn = new DBConn();
        $hash_password = password_encryption("Hello123");//encrypt password
        
        //Prepare query and execute 
        $conn = $conn->connect();
        $stmt = $conn->prepare("INSERT INTO STAFF (STAFF_ID, ST_PASSWORD, ACCESS_LEVEL) 
        VALUES (:staff_id, :st_password, :access_level)");
        $stmt->bindParam(':staff_id', $s_id);
        $stmt->bindParam(':st_password', $hash_password);
        $stmt->bindParam(':access_level', $role);

        if($stmt->execute())
        {
            echo "Success";
 
        }
        else 
        {
            echo "Failure";
        }				
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    try
    {
        $s_id = "H112";
        $role = "Academic";
        //Create instance of Database Connection
        $conn = new DBConn();
        $hash_password = password_encryption("Hello123");//encrypt password
        
        //Prepare query and execute 
        $conn = $conn->connect();
        $stmt = $conn->prepare("INSERT INTO STAFF (STAFF_ID, ST_PASSWORD, ACCESS_LEVEL) 
        VALUES (:staff_id, :st_password, :access_level)");
        $stmt->bindParam(':staff_id', $s_id);
        $stmt->bindParam(':st_password', $hash_password);
        $stmt->bindParam(':access_level', $role);

        if($stmt->execute())
        {
            echo "Success";
 
        }
        else 
        {
            echo "Failure";
        }				
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    try
    {
        $s_id = "S111";
        $role = "Male";
        $f_name = "Patrick";
        $l_name = "Chip";
        $email = "Chip";
        $number = "+679 9790321";

        //Create instance of Database Connection
        $conn = new DBConn();
        $hash_password = password_encryption("Hello123");//encrypt password
        
        //Prepare query and execute 
        $conn = $conn->connect();
        $stmt = $conn->prepare("INSERT INTO STUDENT (STUDENT_ID, GENDER, First_Name, Last_Name, S_Password, Email, Phone_Number) 
        VALUES (:student_id, :gender, :first_name, :last_name, :s_password, :email, :phone_number)");
        $stmt->bindParam(':student_id', $s_id);
        $stmt->bindParam(':gender', $role);
        $stmt->bindParam(':first_name', $f_name);
        $stmt->bindParam(':last_name', $l_name);
        $stmt->bindParam(':s_password', $hash_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $number);        

        if($stmt->execute())
        {
            echo "Success";
 
        }
        else 
        {
            echo "Failure";
        }				
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

?>