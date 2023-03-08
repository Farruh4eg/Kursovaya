<?php
    include_once('serverConnection.php');

    $query = $_GET['find'];
    $query = htmlspecialchars($query);
    $query = $conn -> real_escape_string($query);
    $sqlSearch = "SELECT * FROM books WHERE ('book_title' LIKE '%".$query."%') OR ('book_author' LIKE '%".$query."%')";
    $result = $conn->query($sqlSearch);
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Поиск</title>
    </head>
    <body>
        <?php 
        if($result -> num_rows > 0) {
            while($results = $result->fetch_assoc()) {
                $book_title = $results['book_title'];
                $book_author = $results['book_author'];
                $book_cover = $results['book_cover'];
                $book_link = $results['book_link'];

                echo "<div class='searchRes'>";
                echo "<a href=";
                print_r($book_link);
                echo "class='resLink'></a>";
                echo "<img src='../images/";
                print_r($book_cover);
                echo "'class='resImg'>";
                echo "<h2 class='resTitle'>";
                print_r($book_title);
                echo "</h2>";
                echo "<h3 class='resAuthor'>Автор: ";
                print_r($book_author);
                echo "</h3>";
            }
        }
        else {
            echo "<h1>RoflanEbalo</h1>";
        } 
        $conn->close();
    ?>
    </body>
    </html>