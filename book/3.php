
<?php
include_once('../serverConnection.php');

session_start();

if(!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}

$downloadsQ = "SELECT book_downloads FROM books WHERE id = 3 ;";
$resDown = $conn->query($downloadsQ);
$row = $resDown->fetch_assoc();
$bookDown = $row['book_downloads'];
?>
<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>";
    print_r("Harry Potter and The Deathly Hallows");
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
            <a href='http://www.localhost/Kursach/library.php'>
                    <img class='logoImage' src='../images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='http://www.localhost/Kursach/search.php' method='get' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value='' >
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
            <li><a href='http://www.localhost/kursach/genres/list.php' class='genres' class='navMenu'>Жанры ▼</a>
                <div class='dropdown-content'>
                    <a href='http://www.localhost/kursach/genres/textbook.php'>Учебники</a>
                    <a href='http://www.localhost/kursach/genres/horror.php'>Ужасы</a>
                    <a href='http://www.localhost/kursach/genres/fantasy.php'>Фантастика</a>
                    <a href='http://www.localhost/kursach/genres/detective.php'>Детектив</a>
                    <a href='http://www.localhost/kursach/genres/adventures.php'>Приключения</a>
                    <a href='http://www.localhost/kursach/genres/novel.php'>Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href='#' class='navMenu'>Новое</a></li>
            <li><a href='#' class='navMenu'>Рекомендуемое</a></li>";
            ?>

            <?php if ($_SESSION["logged_in"]) : ?>
            <?php
            echo "
                <li><a href='http://www.localhost/kursach/signOut.php' class='navMenu signOut'>Выйти </a></li>";
            ?>
            <?php else: ?>
            <?php
            echo "
                <li><a href='http://www.localhost/kursach/login.php' class='navMenu logIn'>Войти</a></li>
                <li><a href='http://www.localhost/kursach/signup.php' class='navMenu signUp'>Регистрация</a></li>";
            ?>
                <?php endif; ?>
            <?php
        echo "
        </ul>
    </nav>";
    echo " <div class='bookPage'>";
    echo " <div class='imgAndLink'>";
    echo " <img src= '../images/";
    print_r("bookCoverThree.jfif");
    echo " ' alt='bookCover'>";
    ?>
    <?php
    if ($_SESSION["logged_in"]) {
    echo " <a href=";
    print_r("/kursach/book/bookFiles/Harry_Potter_And_The_Deathly_Hallows.epub");
    echo " download onclick='increment()'class='downloadbook'>";
    echo " Скачать книгу";
    echo " </a>";
    } else {
    echo " <p class='auth'>";
    echo " Для скачивания книги, войдите в свою учетную запись";
    echo " </p>";
    }
    ?>
    <?php
    echo " </div>";
    echo " <div class='bookInfo'> ";
    echo "<p class='info' style='font-size: 18px;'> <span class='infoRow'>Название книги: </span>";
    print_r("Harry Potter and The Deathly Hallows");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Автор: </span>";
    print_r("J.K.Rowling");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Год выпуска: </span>";
    print_r("2007");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Количество скачиваний: </span>";
    echo " $bookDown";
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Жанры: </span>";
    print_r("fantasy, adventures, фэнтэзи, приключения");
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = 'description'>";
    echo "<h1>Описание</h1>";
    echo "<p class='info' style='font-size: 21px;'>";
    print_r("Throughout the six previous novels in the series, the main character Harry Potter has struggled with the difficulties of adolescence along with being famous as the only person ever to survive the Killing Curse. The curse was cast by Tom Riddle, better known as Lord Voldemort, a powerful evil wizard who murdered Harry's parents and attempted to kill Harry as a baby, due to a prophecy which claimed Harry would be able to stop him. As an orphan, Harry was placed in the care of his Muggle (non-magical) relatives Petunia Dursley and Vernon Dursley, with their son Dudley Dursley.");
    echo "</p>";
    echo "<input type='hidden' id='hidden_id' name='hidden_id' class='hidden_id' value=";
    print_r("3");
    echo ">";
    echo "</div>";
echo "</body>";
echo "</html>";
?>