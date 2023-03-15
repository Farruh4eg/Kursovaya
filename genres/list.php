<?php
session_start();
include_once('../loginConnection.php');

if (!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/image 2.png">
    <link rel="stylesheet" href="http://www.localhost/kursach/genresList.css">
    <script defer src="http://www.localhost/kursach/script.js"></script>
    <title>Жанры</title>
</head>

<body>
    <nav class="navBar">
        <div>
            <a href="http://www.localhost/Kursach/Library.php">
                <img class="logoImage" src="http://www.localhost/kursach/images/image 2.svg" alt="logo">
            </a>
        </div>
        <form action="http://www.localhost/kursach/search.php" method="get" id="search" class="searchTag" style="display:flex; margin-left:2rem;">
            <input class="searchBar" name="find" type="text" placeholder="Название книги или имя автора" maxlength="150" autocomplete="off" value="" style="  font-family: 'Nunito Sans', sans-serif;
">
            <button class="searchButton" style="padding:0;">
                <img class="lupaImage" src="http://www.localhost/kursach/images/magnifyingGlassIcon.png" alt="magnifyingGlass">
            </button>
            <div id="sfac_cont">
                <div id="nspotlight" class="nspotlight" style="display: none;"></div>
            </div>
        </form>

        <a href="#" name="srchBtn" class="srchBtn">

        </a>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img src="http://www.localhost/kursach/images/sun.png" alt="theme">
        </button>
        <ul class="dropdown">
            <li><a href="http://www.localhost/kursach/genres/list.php" class="genres" class="navMenu">Жанры ▼</a>
                <div class="dropdown-content">
                    <a href="http://www.localhost/kursach/genres/textbook.php">Учебники</a>
                    <a href="http://www.localhost/kursach/genres/horror.php">Ужасы</a>
                    <a href="http://www.localhost/kursach/genres/fantasy.php">Фантастика</a>
                    <a href="http://www.localhost/kursach/genres/detective.php">Детектив</a>
                    <a href="http://www.localhost/kursach/genres/adventures.php">Приключения</a>
                    <a href="http://www.localhost/kursach/genres/novel.php">Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href="#" class="navMenu">Новое</a></li>
            <li><a href="#" class="navMenu">Рекомендуемое</a></li>
            <?php if (($_SESSION["logged_in"] == true)) : ?>
                <li><a href="http://www.localhost/kursach/signOut.php" class="navMenu signOut">Выйти </a></li>
            <?php else : ?>
                <li><a href="http://www.localhost/kursach/login.php" class="navMenu logIn">Войти</a></li>
                <li><a href="http://www.localhost/kursach/signup.php" class="navMenu signUp">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="list">
        <a href="textbook.php" class="genre">Учебники</a>
        <a href="horror.php" class="genre">Ужасы</a>
        <a href="fantasy.php" class="genre">Фантастика</a>
        <a href="detective.php" class="genre">Детектив</a>
        <a href="adventures.php" class="genre">Приключения</a>
        <a href="novel.php" class="genre">Роман</a>
    </div>
    <footer>
        <img src="http://www.localhost/kursach/images/image 3.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="http://www.localhost/kursach/images/youtubeLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="http://www.localhost/kursach/images/twitterLogo.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="http://www.localhost/kursach/images/tiktokLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="http://www.localhost/kursach/images/gmailLogo.png" alt="novsuLogo" style="object-fit: cover;">
    </footer>
</body>

</html>