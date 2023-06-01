<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = "";

try {
    $servername = "172.20.8.5";
    $dbname = "registration";
    $username = "st2996_14";
    $password = "F12345678_";

    $conn = new PDO(
        "mysql:host=$servername; dbname=registration",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>