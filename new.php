<?php
session_start();
include_once('loginConnection.php');
if (!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}
?>

<?php
$sql = "SELECT * FROM books ORDER BY id DESC LIMIT 12";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Новое</title>
        <link rel='icon' type='image/x-icon' href='http://www.localhost/kursach/images/image 2.png'>
        <link rel='stylesheet' href='http://www.localhost/kursach/newStyle.css'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <script defer src='http://www.localhost/kursach/script.js'></script>
    </head>
";
echo " <body>
<nav class='navBar'>
        <div>
            <a href='http://www.localhost/kursach/Library.php'>
                    <img class='logoImage' src='http://www.localhost/kursach/images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='http://www.localhost/kursach/search.php' method='get' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value=''>
            <button class='searchButton' style='padding:0;'>
                <img class='lupaImage' src='http://www.localhost/kursach/images/magnifyingGlassIcon.png' alt='magnifyingGlass'>
            </button>
            <div id='sfac_cont'>
                <div id='nspotlight' class='nspotlight' style='display: none;'></div>
            </div>
        </form>
        <a href='http://www.localhost/kursach/extendedSearch.php' style='width: 24px; height: 28px;'>
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' style='width: 100%; height: 100%'>
                <path fill='#fff' d='M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z' />
            </svg>
        </a>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img src='http://www.localhost/kursach/images/sun.png' alt='theme'>
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
            <li><a href='http://www.localhost/kursach/new.php' class='navMenu'>Новое</a></li>
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
    </nav>
    <div class='results'>";
foreach ($result as $row) {

    $book_title = $row['book_title'];
    $book_author = $row['book_author'];
    $book_cover = $row['book_cover'];
    $book_link = $row['book_link'];

    echo "<div class='searchRes'>";
    echo "<a href=";
    print_r($book_link);
    echo " class='resLink'>";
    echo "<img src='http://www.localhost/kursach/images/";
    print_r($book_cover);
    echo "' alt='bookcoverimage' class='resImg'></a>";
    echo "<h2 class='resTitle'>";
    print_r($book_title);
    echo "</h2>";
    echo "<h3 class='resAuthor'>Автор: ";
    print_r($book_author);
    echo "</h3>";
    echo "</div>";
}
echo "</div>";
echo "<footer>
<img src='http://www.localhost/kursach/images/image 3.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='http://www.localhost/kursach/images/youtubeLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='http://www.localhost/kursach/images/twitterLogo.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='http://www.localhost/kursach/images/tiktokLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='http://www.localhost/kursach/images/gmailLogo.png' alt='novsuLogo' style='object-fit: cover;'>
</footer>";
echo "</body>";
echo "</html>";
?>