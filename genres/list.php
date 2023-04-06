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
    <link rel="stylesheet" href="../genresList.css">
    <script defer src="../script.js"></script>
    <title>Жанры</title>
</head>

<body>
    <nav class="navBar">
        <div>
            <a href="../Library.php">
                <img class="logoImage" src="../images/image 2.svg" alt="logo">
            </a>
        </div>
        <form action="../search.php" method="get" id="search" class="searchTag" style="display:flex; margin-left:2rem;">
            <input class="searchBar" name="find" type="text" placeholder="Название книги или имя автора" maxlength="150" autocomplete="off" value="" style="  font-family: 'Nunito Sans', sans-serif;
">
            <button class="searchButton" style="padding:0;">
                <img class="lupaImage" src="../images/magnifyingGlassIcon.png" alt="magnifyingGlass">
            </button>
            <div id="sfac_cont">
                <div id="nspotlight" class="nspotlight" style="display: none;"></div>
            </div>
        </form>
        <a href='../extendedSearch.php' style='width: 24px; height: 28px;'>
            <svg class='entended' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' style='width: 100%; height: 100%'>
                <path fill='#fff' d='M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z' />
            </svg>
        </a>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img src="../images/sun.png" alt="theme">
        </button>
        <ul class="dropdown">
            <li><a href="../genres/list.php" class="genres" class="navMenu">Жанры ▼</a>
                <div class="dropdown-content">
                    <a href="../genres/textbook.php">Учебники</a>
                    <a href="../genres/horror.php">Ужасы</a>
                    <a href="../genres/fantasy.php">Фантастика</a>
                    <a href="../genres/detective.php">Детектив</a>
                    <a href="../genres/adventures.php">Приключения</a>
                    <a href="../genres/novel.php">Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href="../new.php" class="navMenu">Новое</a></li>
            <li><a href="#" class="navMenu">Рекомендуемое</a></li>
            <?php if (($_SESSION["logged_in"] == true)) : ?>
                <li><a href="../signOut.php" class="navMenu signOut">Выйти </a></li>
            <?php else : ?>
                <li><a href="../login.php" class="navMenu logIn">Войти</a></li>
                <li><a href="../signup.php" class="navMenu signUp">Регистрация</a></li>
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
        <img src="../images/image 3.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="../images/youtubeLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="../images/twitterLogo.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="../images/tiktokLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="../images/gmailLogo.png" alt="novsuLogo" style="object-fit: cover;">
    </footer>
</body>

</html>