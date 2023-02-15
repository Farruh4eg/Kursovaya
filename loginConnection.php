<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = "";

try {
    $servername = "localhost";
    $dbname = "registration";
    $username = "root";
    $password = "";

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
