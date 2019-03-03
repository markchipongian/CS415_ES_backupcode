<?php require_once("DBConn.php"); ?>

<?php 

    class Staff
    {
        private function password_check($pass, $pas)
        {
			return password_verify($pass, $pas); 
        } 

        public function login($staff_id, $password)
        {
            try
			{
				//Create instance of Database Connection
				$conn = new DBConn();
				$conn = $conn->connect();
		
				//Prepare login query and execute 
				$stmt = $conn->prepare("SELECT * FROM STAFF
										WHERE STAFF_ID = (:staff_id);");
				$stmt->bindParam(':staff_id', $staff_id);
			   
				if($stmt->execute())
				{
					$rows = $stmt->fetch();
					
                    if ($this->password_check($password, $rows['ST_Password']))
                    {
                        return $rows['ACCESS_LEVEL'];
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

        public function begin_registration()
        {

        }

        public function close_registration()
        {

        }

        public function find_student($student_id)
        {

        }
    }

?>