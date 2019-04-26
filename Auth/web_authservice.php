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

        return $output;
    }
   

?>