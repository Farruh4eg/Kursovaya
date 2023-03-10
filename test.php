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

$result = mysqli_query($conn, "SELECT * FROM books");
while ($row = mysqli_fetch_array($result)) {
    echo " <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>";
    print_r($row['book_title']);
    echo "</title>
    <link rel='icon' type='image/x-icon' href='images/image 2.png'>
    <link rel='stylesheet' href='bookPageStyle.css'>
    <script defer src='script.js'></script>
</head> ";

    echo "<body>
<nav class='navBar'>
        <div>
            <a href='Library.html'>
                <button class='goToMainBtn'>
                    <img class='logoImage' src='images/image 2.png' alt='logo'>
                </button>
            </a>
        </div>
        <form action='/search' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
            <div id='temp'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value=''>
            </div>
            <button class='searchButton' style='padding:0;'>
                <img class='lupaImage' src='images/magnifyingGlassIcon.png' alt='magnifyingGlass'>
            </button>
            <div id='sfac_cont'>
                <div id='nspotlight' class='nspotlight' style='display: none;'></div>
            </div>
        </form>

        <a href='#' name='srchBtn' class='srchBtn'>

        </a>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img src='images/sun.png' alt='theme'>
        </button>
        <ul class='dropdown'>
            <li><a href='#' class='genres' class='navMenu'>Жанры ▼</a>
                <div class='dropdown-content'>
                    <a href='#'>Учебники</a>
                    <a href='#'>Ужасы</a>
                    <a href='#'>Фантастика</a>
                    <a href='#'>Детектив</a>
                    <a href='#'>Приключения</a>
                    <a href='#'>Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href='#' class='navMenu'>Новое</a></li>
            <li><a href='#' class='navMenu'>Рекомендуемое</a></li>
            <li><a href='login.php' class='navMenu logIn'>Войти</a></li>
            <li><a href='signup.php' class='navMenu signIn'>Регистрация</a></li>
        </ul>
    </nav>";
    echo " <div class='bookPage'> ";
    echo " <img src= images/";
    print_r($row['book_cover']);
    echo " alt='bookCover'>";
    echo " <div class='bookInfo'> ";
    echo "<p class='info' style='font-size: 18px;'> <span class='infoRow'>Название книги: </span>";
    print_r($row['book_title']);
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Автор: </span>";
    print_r($row['book_author']);
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Год выпуска: </span>";
    print_r($row['book_release_year']);
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Количество скачиваний: </span>";
    print_r($row['book_downloads']);
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Жанры: </span>";
    print_r($row['book_genres']);
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = 'description'>";
    echo "<h1>Описание</h1>";
    echo "<p class='info' style='font-size: 21px;'>";
    print_r($row['book_description']);
    echo "</p>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
}
// while($row = mysqli_fetch_array($result))
// {
// echo "<tr>";
// echo "<td>" . $row['book_title'] . "</td>";
// echo "<td>" . $row['book_author'] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

mysqli_close($conn);
