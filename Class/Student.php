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

        public function student_course($student_id)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare("SELECT * FROM STUDENT_PROG WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }

        public function student_course_completed($student_id)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare("SELECT COURSE_CODE FROM COMP_COURSE WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }

        public function student_course_registered($student_id)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare("SELECT * FROM REGISTRATIONS WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }

        public function student_course_not_completed($student_id)
        {
            $result_prog = $this->student_course($student_id);
            $result_comp = $this->student_course_completed($student_id);
            $rsult_register = $this->student_course_registered($student_id);
            $array[50];
            $size = 0;
        }



        public function student_grades($student_id)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                $stmt = $conn->prepare("SELECT * FROM COMP_COURSE WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }
    }


?>