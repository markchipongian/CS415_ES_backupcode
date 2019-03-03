<?php require_once("DBConn.php"); ?>

<?php

    class Student
    {
        private function password_check($pass, $pas)
        {
			return password_verify($pass, $pas); 
        }
        
        public function login($student_id, $password)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
				$conn = $conn->connect();
		
				//Prepare login query and execute 
				$stmt = $conn->prepare("SELECT * FROM STUDENT
										WHERE STUDENT_ID = (:student_id);");
				$stmt->bindParam(':student_id', $student_id);
			   
				if($stmt->execute())
				{
					$rows = $stmt->fetch();
					
                    if ($this->password_check($password, $rows['S_Password']))
                    {
                        return true;
                    }
                    else
                    {
                        // $_SESSION["error"] = 3;
                        return false;
                    }
                }
                else
                {
                    // $_SESSION["error"] = 3;
                    return false;

                }
			}
			catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }
        
        public function registration($student_id, $course_code)
        {

        }

        public function student_details($student_id)
        {

        }

        public function student_academic_details($student_id)
        {

        }

        public function student_grades($student_id)
        {

        }
    }


?>