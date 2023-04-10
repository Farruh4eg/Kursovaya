
<?php
include_once('../serverConnection.php');

session_start();

if(!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}

$downloadsQ = "SELECT book_downloads FROM books WHERE id = 14 ;";
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
    print_r("Harry Potter and the Half-Blood Prince");
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
            <a href='../library.php'>
                    <img class='logoImage' src='../images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='../search.php' method='get' id='search' class='searchTag' style='display:flex; margin-left:20px;'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value='' >
            <button class='searchButton' style='padding:0;'>
                <img class='lupaImage' src='../images/magnifyingGlassIcon.png' alt='magnifyingGlass'>
            </button>
            <div id='sfac_cont'>
                <div id='nspotlight' class='nspotlight' style='display: none;'></div>
            </div>
        </form>
        <a class='extendedSearchFilter' href='../extendedSearch.php' style='width: 24px; height: 28px;'>
            <svg class='entended' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' style='width: 100%; height: 100%'>
                <path fill='#fff' d='M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z' />
            </svg>
        </a>
        <a href='#' name='srchBtn' class='srchBtn'>

        </a>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img class='sun' src='../images/sun.png' alt='theme'>
        </button>
        <ul class='dropdown'>
            <li><a href='../genres/list.php' class='genres' class='navMenu'>Жанры ▼</a>
                <div class='dropdown-content'>
                    <a href='../genres/textbook.php'>Учебники</a>
                    <a href='../genres/horror.php'>Ужасы</a>
                    <a href='../genres/fantasy.php'>Фантастика</a>
                    <a href='../genres/detective.php'>Детектив</a>
                    <a href='../genres/adventures.php'>Приключения</a>
                    <a href='../genres/novel.php'>Роман</a>
                </div>
            </li>
        </ul>
        <ul class='rightNav'>
            <li><a id='navSmall' class='navMenu navSmall' style='width: 24px; height: 28px;'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path d='M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z' fill='#ffffff'/></svg></a></li>
            <li><a href='../new.php' class='navMenu'>Новое</a></li>
            <li><a href='recommended.php' class='navMenu'>Рекомендуемое</a></li>";
            ?>

            <?php if ($_SESSION["logged_in"]) : ?>
            <?php
            echo "
                <li><a href='../signOut.php' class='navMenu signOut'>Выйти </a></li>
                <li style='width: 24px; height: 28px;'><a href='../signOut.php' class='navMenu signOutSmall' style='width: 100%; height: 100%'><svg class='signOutSmallIcon'xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z' fill='#ffffff'/></svg>
                </a></li>";
            ?>
            <?php else: ?>
            <?php
            echo "
                <li><a href='../login.php' class='navMenu logIn'>Войти</a></li>
                <li><a href='../signup.php' class='navMenu signUp'>Регистрация</a></li>
                <li><a href='../login.php' style='width: 24px; height: 28px;' class='navMenu logInSmall'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path d='M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z' fill='#ffffff'/></svg>
                </a></li>";
            ?>
                <?php endif; ?>
            <?php
            echo "
            </ul>
        </nav>
        <div id='responsiveNav' style='display: flex; flex-direction: column; position: fixed; top: 0; bottom: 0; right: -280px; z-index: 30; background-color: rgb(23, 26, 33); width: 280px; color: white; line-height: 2.5em; padding: 0 12px; transition: right 0.5s, left 0.5s; font-family: Nunito Sans, sans-serif'>
            <a href='genres/list.php' style='border-top: 1px solid #2f3138; border-bottom: 1px solid black'>Жанры</a>
            <a href='new.php' style='border-top: 1px solid #2f3138; display: flex; border-bottom: 1px solid black'>Новое</a>
            <a href='recommended.php' style='border-top: 1px solid #2f3138; display: flex; border-bottom: 1px solid black'>Рекомендуемое</a>";
        ?>
    
        <?php if ($_SESSION["logged_in"]) : ?>
        <?php
        echo "
            <a href='signOut.php' class='navMenu signOut' style='border-top: 1px solid #2f3138; display: flex; border-bottom: 1px solid black'>Выйти </a>";
        ?>
        <?php else: ?>
        <?php
        echo "
            <a href='login.php' class='navMenu logIn' style='border-top: 1px solid #2f3138; display: flex; border-bottom: 1px solid black'>Войти</a>
            <a href='signup.php' class='navMenu signUp' style='border-top: 1px solid #2f3138; display: flex; border-bottom: 1px solid black'>Регистрация</a>
            </div>";
        ?>
            <?php endif; ?>
        <?php
    echo " <div class='bookPage'>";
    echo " <div class='imgAndLink'>";
    echo " <img src= '../images/";
    print_r("HarryPotterAndTheHalfBloodPrince_.jpg");
    echo " ' alt='bookCover'>";
    ?>
    <?php
    if ($_SESSION["logged_in"]) {
    echo " <a href=";
    print_r("/kursach/book/bookFiles/Harry_Potter_And_the_Half_Blood_Prince.epub");
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
    print_r("Harry Potter and the Half-Blood Prince");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Автор: </span>";
    print_r("J.K.Rowling");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Год выпуска: </span>";
    print_r("2005");
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Количество скачиваний: </span>";
    echo " $bookDown";
    echo "</p>";
    echo "<p class='info' style='font-size: 18px;'><span class='infoRow'>Жанры: </span>";
    print_r("fantasy, adventures, novel, фэнтэзи, приключения, роман");
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = 'description'>";
    echo "<h1>Описание</h1>";
    echo "<p class='info' style='font-size: 21px;'>";
    print_r("It is the middle of the summer, but there is an unseasonal mist pressing against the windowpanes. Harry Potter is waiting nervously in his bedroom at the Dursleys' house in Privet Drive for a visit from Professor Dumbledore himself. One of the last times he saw the Headmaster was in a fierce one-to-one duel with Lord Voldemort, and Harry can't quite believe that Professor Dumbledore will actually appear at the Dursleys' of all places. Why is the Professor coming to visit him now? What is it that cannot wait until Harry returns to Hogwarts in a few weeks' time? Harry's sixth year at Hogwarts has already got off to an unusual start, as the worlds of Muggle and magic start to intertwine...");
    echo "</p>";
    echo "<input type='hidden' id='hidden_id' name='hidden_id' class='hidden_id' value=";
    print_r("14");
    echo ">";
    echo "</div>";
    echo "<footer>
    <img src='../images/image 3.png' alt='novsuLogo' style='object-fit: cover;'>
    <img src='../images/youtubeLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
    <img src='../images/twitterLogo.png' alt='novsuLogo' style='object-fit: cover;'>
    <img src='../images/tiktokLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
    <img src='../images/gmailLogo.png' alt='novsuLogo' style='object-fit: cover;'>
    </footer>";
echo "</body>";
echo "</html>";
?>