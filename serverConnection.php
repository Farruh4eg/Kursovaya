<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "registration";
   
     // Create a connection 
     $conn = mysqli_connect($servername, 
         $username, $password, $database);
   
   
    if($conn) {
        
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>