<?php
$servername = "localhost";
$username = "root";
$password = "";

$database = "registration";

// Create a connection 
$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);


if ($conn) {
} else {
    die("Error" . mysqli_connect_error());
}

$book_id = $_POST['id'];

$query = "UPDATE books SET book_downloads = book_downloads+1 WHERE id = $book_id";
mysqli_query($conn, $query);

mysqli_close($conn);
?>