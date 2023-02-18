
<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>";
    print_r('Outsider');
    echo "</title>
    <link rel='icon' type='image/x-icon' href='../images/image 2.png'>
    <link rel='stylesheet' href='../bookPageStyle.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
    <script defer src='../script.js'></script>
</head> ";
    
echo "<body>
    <nav class='navBar'>
        <div>
            <a href='../Library.html'>
                <button class='goToMainBtn'>
                    <img class='logoImage' src='../images/image 2.svg' alt='logo'>
                </button>
            </a>
        </div>
        <form action='/search' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
            <div id='temp'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value=''>
            </div>
            <button class='searchButton' style='padding:0;'>
                <img class='lupaImage' src='../images/magnifyingGlassIcon.png' alt='magnifyingGlass'>
            </button>
            <div id='sfac_cont'>
                <div id='nspotlight' class='nspotlight' style='display: none;'></div>
            </div>
        </form>

        <a href='#' name='srchBtn' class='srchBtn'>

        </a>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img src='../images/sun.png' alt='theme'>
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
            <li><a href='signup.php' class='navMenu signUp'>Регистрация</a></li>
        </ul>
    </nav>";
    echo " <div class='bookPage'>";
    echo " <div class='imgAndLink'>";
    echo " <img src= '../images/";
    print_r('bookCoverFive.jpg');
    echo " ' alt='bookCover'>";
    echo " <a href=";
    print_r('https://dropmefiles.com/wRSW1');
    echo " ' download class='downloadbook'>";
    echo " Скачать книгу";
    echo " </a>";
    echo " </div>";
    echo " <div class='bookInfo'> ";
    echo "<p class='info' style='font-size: 18px;'> <span class='infoRow'>Название книги: </span>";
    print_r('Outsider');
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Автор: </span>";
    print_r('Steven King');
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Год выпуска: </span>";
    print_r('2018');
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Количество скачиваний: </span>";
    print_r('0');
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Жанры: </span>";
    print_r('ужасы, детектив, драма, horror, detective, drama');
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = 'description'>";
    echo "<h1>Описание</h1>";
    echo "<p class='info' style='font-size: 21px;'>";
    print_r("'The Outsider' is about the story of the murder investigation of an 11-year-old boy, Frankie Peterson. After DNA and the questioning of witnesses, Terry Maitland, the little league's coach is arrested as the primary suspect for Frankie's murder.");
    echo "</p>";
    echo "</div>";
echo "</body>";
echo "</html>";
?>