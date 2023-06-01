<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $servername = "172.20.8.5"; 
    $username = "st2996_14"; 
    $password = "F12345678_";
   
    $database = "registration";
   
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
   
   
    if($conn) {
        
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>