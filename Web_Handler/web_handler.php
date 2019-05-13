<?php 

// echo "WEB HANDLER";
require_once("../Auth/web_authservice.php"); 
 // Include the main TCPDF library (search for installation path).
 require('tcpdf_include.php');

?>

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
        // echo $result;
        if ($result == 'null')
        {
            // echo $result;
            $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Incorrect Login Credentials</div>";
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
                $_SESSION["Prog_Name"] = $responseData[0]['PROG_NAME'];
                // $_SESSION["Prog_Name"] = "HDR";
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
            }
            else{
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
            $alertmsgg = "<div class='alert alert-success' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Grade Recheck Request Sent</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Student/grades.php");
         }else{
            //  echo "FAILED";
            $alertmsgg = "<div class='alert alert-danger' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed to request Grade Recheck</div>";
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
        // echo $data;
        $result = APICall($data,$type); 

         if($result == 'true')
        {
            // echo "PASSED";
            $alertmsgg = "<div class='alert alert-success' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Grade Successfully Changed</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Manager/dashboard.php");
         }
         else
         {
            //  echo "FAILED";
            $alertmsgg = "<div class='alert alert-danger' style='text-align: center;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed to Change Grade</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Manager/dashboard.php");
         }
        //$responseData = json_decode($result,true);
        //echo $responseData;
    }
    else if(isset($_POST['submit_report']))
    { 
        $course = array();
        // $type='report_course';
        array_push($course, $_POST['course']);
        $dateFrom = $_POST['report_startDate'];
        $dateTo = $_POST['report_endDate'];
        
        // print_r($course);
        // $cred = array('username' => $student_id, 'course_code' => $course, 'grade'=> $grade);
       

         //create new PDF document
        //  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        //  $obj_pdf->SetCreator(PDF_CREATOR);  
        //  $obj_pdf->SetTitle("Report On Selected Course");  
        //  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
        //  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        //  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
        //  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
        //  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
        //  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
        //  $obj_pdf->setPrintHeader(false);  
        //  $obj_pdf->setPrintFooter(false);  
        //  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
        //  $obj_pdf->SetFont('helvetica', '', 12);  
        //  $obj_pdf->AddPage();  
        //  $content = '';  
        //  $content .= '  
        //  <h3 align="center">Report On Selected Course</h3><br /><br />  
        //  <table border="1" cellspacing="0" cellpadding="5">  
        //       <tr>  
        //         <th width="33.3%">ID</th>  
        //         <th width="33.3%">COURSE CODE</th>  
        //         <th width="33.3%">FEE</th> 
        //       </tr>  
        //  ';  
        //  //$content .= fetch_data();  
        //  $content .= '</table>';  
        //  $obj_pdf->writeHTML($content);  
        //  $obj_pdf->Output('sample.pdf', 'I');  

        if(!empty($course))
        {
            // $details = array('course' => $course);
            $type='report_course';
            $data = json_encode($course);
            $result = json_decode(APICall($data,$type), true); 
            echo $result;


            // if($result){

            //     // create new PDF document
            //     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            //     $obj_pdf->SetCreator(PDF_CREATOR);  
            //     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
            //     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            //     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            //     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            //     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            //     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            //     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            //     $obj_pdf->setPrintHeader(false);  
            //     $obj_pdf->setPrintFooter(false);  
            //     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            //     $obj_pdf->SetFont('helvetica', '', 12);  
            //     $obj_pdf->AddPage();  
            //     $content = '';  
            //     $content .= '  
            //     <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
            //     <table border="1" cellspacing="0" cellpadding="5">  
            //          <tr>  
            //               <th width="5%">ID</th>  
            //               <th width="30%">COURSE CODE</th>  
            //               <th width="10%">Gender</th>  
            //               <th width="45%">Designation</th>  
            //               <th width="10%">Age</th>  
            //          </tr>  
            //     ';  
            //     //$content .= fetch_data();  
            //     $content .= '</table>';  
            //     $obj_pdf->writeHTML($content);  
            //     $obj_pdf->Output('sample.pdf', 'I');  
            // }else{
            //     // create new PDF document
            //     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            //     $obj_pdf->SetCreator(PDF_CREATOR);  
            //     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
            //     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            //     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            //     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            //     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            //     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            //     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            //     $obj_pdf->setPrintHeader(false);  
            //     $obj_pdf->setPrintFooter(false);  
            //     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            //     $obj_pdf->SetFont('helvetica', '', 12);  
            //     $obj_pdf->AddPage();  
            //     $content = '';  
            //     $content .= '  
            //     <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
            //     <table border="1" cellspacing="0" cellpadding="5">  
            //         <tr>  
            //             <th width="5%">ID</th>  
            //             <th width="30%">COURSE CODE</th>  
            //             <th width="10%">Gender</th>  
            //             <th width="45%">Designation</th>  
            //             <th width="10%">Age</th>  
            //         </tr>  
            //     ';  
            //     //$content .= fetch_data();  
            //     $content .= '</table>';  
            //     $obj_pdf->writeHTML($content);  
            //     $obj_pdf->Output('sample.pdf', 'I');  
            // }
        }
        else if(empty($course) && (!empty($dateFrom) && !empty($dateTo)))
        {
            $details = array('date_from' => $dateFrom, 'date_to' => $dateTo);
            $data = json_encode($details);
            $result = APICall($data,$type); 

            if($result){

                // create new PDF document
                ob_start();
                $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                $obj_pdf->SetCreator(PDF_CREATOR);  
                $obj_pdf->SetTitle("Report For Selected Courses");  
                $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
                $obj_pdf->setPrintHeader(false);  
                $obj_pdf->setPrintFooter(false);  
                $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                $obj_pdf->SetFont('helvetica', '', 12);  
                $obj_pdf->AddPage();  
                $content = '';  
                $content .= '  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
                <table border="1" cellspacing="0" cellpadding="5">  
                    <tr>  
                            <th width="33.3%">ID</th>  
                            <th width="33.3%">COURSE CODE</th>  
                            <th width="33.3%">FEE</th>
                    </tr>  
                ';  
                // $content .= $result;  
                $content .= '</table>';  
                $obj_pdf->writeHTML($content);  
                ob_end_flush();
                $obj_pdf->Output('report.pdf', 'I');  
            }else{
                // create new PDF document
                ob_start();
                $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                $obj_pdf->SetCreator(PDF_CREATOR);  
                $obj_pdf->SetTitle("Report For Selected Courses");  
                $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
                $obj_pdf->setPrintHeader(false);  
                $obj_pdf->setPrintFooter(false);  
                $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                $obj_pdf->SetFont('helvetica', '', 12);  
                $obj_pdf->AddPage();  
                $content = '';  
                $content .= '  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
                <table border="1" cellspacing="0" cellpadding="5">  
                    <tr>  
                            <th width="33.3%">ID</th>  
                            <th width="33.3%">COURSE CODE</th>  
                            <th width="33.3%">FEE</th>
                    </tr>  
                ';  
                $content .= '
                    <tr>  
                        <td width="33.3%">EMPTY</td>  
                        <td width="33.3%">EMPTY</td>  
                        <td width="33.3%">EMPTY</td>
                    </tr> 
                ';  
                $content .= '</table>';  
                $obj_pdf->writeHTML($content);  
                ob_end_flush();
                $obj_pdf->Output('report.pdf', 'I');
            }
        }
        else if(!empty($course) && (!empty($dateFrom) && !empty($dateTo)))
        {
            $details = array('course' => $course, 'date_from' => $dateFrom, 'date_to' => $dateTo);
            $data = json_encode($details);
            $result = APICall($data,$type); 

            if($result){

                // create new PDF document
                ob_start();
                $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                $obj_pdf->SetCreator(PDF_CREATOR);  
                $obj_pdf->SetTitle("Report For Selected Courses");  
                $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
                $obj_pdf->setPrintHeader(false);  
                $obj_pdf->setPrintFooter(false);  
                $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                $obj_pdf->SetFont('helvetica', '', 12);  
                $obj_pdf->AddPage();  
                $content = '';  
                $content .= '  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
                <table border="1" cellspacing="0" cellpadding="5">  
                    <tr>  
                            <th width="33.3%">ID</th>  
                            <th width="33.3%">COURSE CODE</th>  
                            <th width="33.3%">FEE</th>
                    </tr>  
                ';  
                // $content .= $result;  
                $content .= '</table>';  
                $obj_pdf->writeHTML($content);  
                ob_end_flush();
                $obj_pdf->Output('report.pdf', 'I');  
            }else{
                // create new PDF document
                ob_start();
                $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                $obj_pdf->SetCreator(PDF_CREATOR);  
                $obj_pdf->SetTitle("Report For Selected Courses");  
                $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
                $obj_pdf->setPrintHeader(false);  
                $obj_pdf->setPrintFooter(false);  
                $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                $obj_pdf->SetFont('helvetica', '', 12);  
                $obj_pdf->AddPage();  
                $content = '';  
                $content .= '  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
                <table border="1" cellspacing="0" cellpadding="5">  
                    <tr>  
                            <th width="33.3%">ID</th>  
                            <th width="33.3%">COURSE CODE</th>  
                            <th width="33.3%">FEE</th>
                    </tr>  
                ';  
                $content .= '
                    <tr>  
                        <td width="33.3%">EMPTY</td>  
                        <td width="33.3%">EMPTY</td>  
                        <td width="33.3%">EMPTY</td>
                    </tr> 
                ';  
                $content .= '</table>';  
                $obj_pdf->writeHTML($content);  
                ob_end_flush();
                $obj_pdf->Output('report.pdf', 'I');
            }
        }

    }if(isset($_POST['submit_pages']))
    {
        $array = array();
        $type = 'block_pages';

        $array = $_POST['page'];

        $cred = array('pages' => $array);
        $data = json_encode($cred);
        // echo $data;
        $result = APICall($data,$type); 
        $response = json_decode($result, true);
        echo $response;
        if($response){
            $alertmsgg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Block Placed</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Manager/dashboard.php");
        }
        else{
        $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Block Not Placed</div>";
        $_SESSION['alert'] = $alertmsgg;
        header("location: ../Dashboard_Manager/dashboard.php");
    }
       
    }


    else
    {
        echo "temp error message on web_handler";
    }
    ?>