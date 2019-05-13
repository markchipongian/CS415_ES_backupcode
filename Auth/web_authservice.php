<?php
    function APICall($data,$type)
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json'
        );
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.8.155/api/'.$type);
        //set Request to POST Method
        curl_setopt($ch, CURLOPT_POST , true);
        //set custom Headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //set POST Data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch); 
        $BlockedLogin = "BlockedLogin";
        $Blocked = "Blocked";

        // echo $output;Blocked Login
        if(json_decode($output) == $BlockedLogin)
        {
            $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account is on Hold. You Are Blocked From Loging In</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../index.php");
        }
        elseif(json_decode($output) == $Blocked){
            $alertmsgg = "<div class='alert alert-danger'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account is on Hold. Page Blocked</div>";
            $_SESSION['alert'] = $alertmsgg;
            header("location: ../Dashboard_Student/dashboard.php");
        }
        else
        {
            return $output;
        }
    }
   

?>