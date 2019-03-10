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
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare("SELECT * FROM STUDENT WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    return $result;
                }
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
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
                
                $stmt = $conn->prepare("  SELECT value
                FROM (
                  SELECT student_prog.*, 'COURSE_1' AS Course, COURSE_1 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_1_ALT' AS Course, COURSE_1_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_2' AS Course, COURSE_2 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_2_ALT' AS Course, COURSE_2_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_3' AS Course, COURSE_3 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_3_ALT' AS Course, COURSE_3_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_4' AS Course, COURSE_4 AS value FROM student_prog
                   UNION ALL
                  SELECT student_prog.*, 'COURSE_4_ALT' AS Course, COURSE_4_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_5' AS Course, COURSE_5 AS value FROM student_prog
                   UNION ALL
                  SELECT student_prog.*, 'COURSE_5_ALT' AS Course, COURSE_5_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_6' AS Course, COURSE_6 AS value FROM student_prog
                    UNION ALL
                  SELECT student_prog.*, 'COURSE_6_ALT' AS Course, COURSE_6_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_7' AS Course, COURSE_7 AS value FROM student_prog
                   UNION ALL
                  SELECT student_prog.*, 'COURSE_7_ALT' AS Course, COURSE_7_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_8' AS Course, COURSE_8 AS value FROM student_prog
                   UNION ALL
                  SELECT student_prog.*, 'COURSE_8_ALT' AS Course, COURSE_8_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_9' AS Course, COURSE_9 AS value FROM student_prog
                   UNION ALL
                  SELECT student_prog.*, 'COURSE_9_ALT' AS Course, COURSE_9_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_10' AS Course, COURSE_10 AS value FROM student_prog
                 UNION ALL
                  SELECT student_prog.*, 'COURSE_10_ALT' AS Course, COURSE_10_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_11' AS Course, COURSE_11 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_11_ALT' AS Course, COURSE_11_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_12' AS Course, COURSE_12 AS value FROM student_prog
                    UNION ALL
                  SELECT student_prog.*, 'COURSE_12_ALT' AS Course, COURSE_12_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_13' AS Course, COURSE_13 AS value FROM student_prog
                    UNION ALL
                  SELECT student_prog.*, 'COURSE_13_ALT' AS Course, COURSE_13_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_14' AS Course, COURSE_14 AS value FROM student_prog
                    UNION ALL
                  SELECT student_prog.*, 'COURSE_14_ALT' AS Course, COURSE_14_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_15' AS Course, COURSE_15 AS value FROM student_prog
                 UNION ALL
                  SELECT student_prog.*, 'COURSE_15_ALT' AS Course, COURSE_15_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_16' AS Course, COURSE_16 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_16_ALT' AS Course, COURSE_16_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_17' AS Course, COURSE_17 AS value FROM student_prog
                 UNION ALL
                  SELECT student_prog.*, 'COURSE_17_ALT' AS Course, COURSE_17_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_18' AS Course, COURSE_18 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_18_ALT' AS Course, COURSE_18_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_19' AS Course, COURSE_19 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_19_ALT' AS Course, COURSE_19_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_20' AS Course, COURSE_20 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_20_ALT' AS Course, COURSE_20_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_21' AS Course, COURSE_21 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_21_ALT' AS Course, COURSE_21_ALT AS value FROM student_prog
                  UNION ALL  
                  SELECT student_prog.*, 'COURSE_22' AS Course, COURSE_22 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_22_ALT' AS Course, COURSE_22_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_23' AS Course, COURSE_23 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_23_ALT' AS Course, COURSE_23_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_24' AS Course, COURSE_24 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_24_ALT' AS Course, COURSE_24_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_25' AS Course, COURSE_25 AS value FROM student_prog
                 UNION ALL
                  SELECT student_prog.*, 'COURSE_25_ALT' AS Course, COURSE_25_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_26' AS Course, COURSE_26 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_26_ALT' AS Course, COURSE_26_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_27' AS Course, COURSE_27 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_27_ALT' AS Course, COURSE_27_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_28' AS Course, COURSE_28 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_28_ALT' AS Course, COURSE_28_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_29' AS Course, COURSE_29 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_29_ALT' AS Course, COURSE_29_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_30' AS Course, COURSE_30 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_30_ALT' AS Course, COURSE_30_ALT AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_31' AS Course, COURSE_31 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_31_ALT' AS Course, COURSE_31_ALT AS value FROM student_prog
                  UNION ALL  
                  SELECT student_prog.*, 'COURSE_32' AS Course, COURSE_32 AS value FROM student_prog 
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_32_ALT' AS Course, COURSE_32_ALT AS value FROM student_prog
                ) student_prog
                WHERE STUDENT_ID = (:student_id) AND value IS NOT NULL;");
                $stmt->bindParam(':student_id', $student_id);

                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    $result_count = Count( $result);
                    return $result_count;
                }
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }

        public function student_course_to_complete($student_id)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare(" SELECT value
                FROM (
                  SELECT student_prog.*, 'COURSE_1' AS Course, COURSE_1 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_2' AS Course, COURSE_2 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_3' AS Course, COURSE_3 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_4' AS Course, COURSE_4 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_5' AS Course, COURSE_5 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_6' AS Course, COURSE_6 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_7' AS Course, COURSE_7 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_8' AS Course, COURSE_8 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_9' AS Course, COURSE_9 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_10' AS Course, COURSE_10 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_11' AS Course, COURSE_11 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_12' AS Course, COURSE_12 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_13' AS Course, COURSE_13 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_14' AS Course, COURSE_14 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_15' AS Course, COURSE_15 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_16' AS Course, COURSE_16 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_17' AS Course, COURSE_17 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_18' AS Course, COURSE_18 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_19' AS Course, COURSE_19 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_20' AS Course, COURSE_20 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_21' AS Course, COURSE_21 AS value FROM student_prog
                  UNION ALL  
                  SELECT student_prog.*, 'COURSE_22' AS Course, COURSE_22 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_23' AS Course, COURSE_23 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_24' AS Course, COURSE_24 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_25' AS Course, COURSE_25 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_26' AS Course, COURSE_26 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_27' AS Course, COURSE_27 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_28' AS Course, COURSE_28 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_29' AS Course, COURSE_29 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_30' AS Course, COURSE_30 AS value FROM student_prog
                  UNION ALL
                  SELECT student_prog.*, 'COURSE_31' AS Course, COURSE_31 AS value FROM student_prog
                  UNION ALL  
                  SELECT student_prog.*, 'COURSE_32' AS Course, COURSE_32 AS value FROM student_prog 
                ) student_prog
                WHERE STUDENT_ID = (:student_id) AND value IS NOT NULL;");
                $stmt->bindParam(':student_id', $student_id);

                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    // $result_count = Count($result);
                    return $result;
                }
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
                
                $stmt = $conn->prepare("SELECT * FROM COMP_COURSE WHERE STUDENT_ID = (:student_id) AND GRADE LIKE 'A%' OR GRADE LIKE 'B%' OR GRADE LIKE 'C%'OR GRADE LIKE 'R%' OR GRADE LIKE 'P%' OR GRADE LIKE 'M%' OR GRADE LIKE 'S%';");
                $stmt->bindParam(':student_id', $student_id);
                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    return $result;
                }
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
                
                $stmt = $conn->prepare("SELECT * FROM REGISTRATION WHERE STUDENT_ID = (:student_id);");
                $stmt->bindParam(':student_id', $student_id);
                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    return $result;
                }
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
                
                $stmt = $conn->prepare("SELECT * FROM COMP_COURSE WHERE STUDENT_ID = (:student_id) AND GRADE LIKE 'A%' OR GRADE LIKE 'B%' OR GRADE LIKE 'C%'OR GRADE LIKE 'R%' OR GRADE LIKE 'P%' OR GRADE LIKE 'M%' OR GRADE LIKE 'S%';");
                $stmt->bindParam(':student_id', $student_id);
                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    return $result;
                }
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }

        public function student_prereqs($course_code)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
                $conn = $conn->connect();
                
                $stmt = $conn->prepare("SELECT * FROM prerequisities WHERE COURSE_CODE = (:course_code);");
                $stmt->bindParam(':course_code', $course_code);
                if($stmt->execute())
				{
                    $result = $stmt->fetchAll();
                    return $result;
                }
            }
            catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
        }
    }


?>