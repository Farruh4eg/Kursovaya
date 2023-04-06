<?php
include_once('serverConnection.php');
?>
<?php
session_start();
if (!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}


if(!isset($_POST['bookTitle'])) {
    $title = "";
} else {
$title = $_POST['bookTitle'];
$title = htmlspecialchars($title);
$title = mysqli_real_escape_string($conn,$title);
}
if(!isset($_POST['bookAuthor'])) {
    $author = "";
} else {
$author = $_POST['bookAuthor'];
$author = htmlspecialchars($author);
$author = mysqli_real_escape_string($conn,$author);
}
if(!isset($_POST['bookReleaseYear'])) {
    $released = "";
} else {
$released = $_POST['bookReleaseYear'];
$released = htmlspecialchars($released);
$released = mysqli_real_escape_string($conn,$released);
}
if(!isset($_POST['bookGenre'])) {
    $genre = "";
} else {
$genre = $_POST['bookGenre'];
$genre = htmlspecialchars($genre);
$genre = mysqli_real_escape_string($conn,$genre);
}

//total number of search results found
$totalSearchResults = "SELECT COUNT(*) as total FROM books WHERE 1=1 AND (book_title LIKE '%" . $title . "%') AND (book_author LIKE '%" . $author . "%') AND (book_release_year LIKE '%" . $released . "%') AND (book_genres LIKE '%" . $genre . "%')";
$exectsr = $conn->query($totalSearchResults);
$tsrrow = $exectsr->fetch_assoc();
$tsrres = $tsrrow['total'];
//max search results per page
$resultsPerPage = 12;
$totalPages = ceil($tsrres / $resultsPerPage);
//get current page number
$pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1;
//page number within bounds
if($pageNumber < 1) {
    $pageNumber = 1;
} elseif($pageNumber > $totalPages) {
    $pageNumber = $totalPages;
}

//offset
$offset = ($pageNumber - 1) * $resultsPerPage;
//fetch results to the current page
$sqlSearch = "SELECT * FROM books WHERE (book_title LIKE '%" . $title . "%') AND (book_author LIKE '%" . $author . "%') AND (book_release_year LIKE '%" . $released . "%') AND (book_genres LIKE '%" . $genre . "%') LIMIT $offset,$resultsPerPage";
try {
$result = $conn->query($sqlSearch);

?>
<?php
echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Поиск</title>
        <link rel='icon' type='image/x-icon' href='images/image 2.png'>
        <link rel='stylesheet' href='searchResultsStyle.css'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <script defer src='script.js'></script>
    </head>
";
echo " <body>
<nav class='navBar'>
        <div>
            <a href='Library.php'>
                    <img class='logoImage' src='images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='search.php' method='get' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value=''>
            <button class='searchButton' style='padding:0;'>
                <img class='lupaImage' src='images/magnifyingGlassIcon.png' alt='magnifyingGlass'>
            </button>
            <div id='sfac_cont'>
                <div id='nspotlight' class='nspotlight' style='display: none;'></div>
            </div>
        </form>
        <a href='./extendedSearch.php' style='width: 24px; height: 28px;'>
            <svg class='entended' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' style='width: 100%; height: 100%'>
                <path fill='#fff' d='M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z' />
            </svg>
        </a>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img class='sun' src='images/sun.png' alt='theme'>
        </button>
        <ul class='dropdown'>
            <li><a href='./genres/list.php' class='genres' class='navMenu'>Жанры ▼</a>
                <div class='dropdown-content'>
                    <a href='./genres/textbook.php'>Учебники</a>
                    <a href='./genres/horror.php'>Ужасы</a>
                    <a href='./genres/fantasy.php'>Фантастика</a>
                    <a href='./genres/detective.php'>Детектив</a>
                    <a href='./genres/adventures.php'>Приключения</a>
                    <a href='./genres/novel.php'>Роман</a>
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
                <li><a href='./signOut.php' class='navMenu signOut'>Выйти </a></li>";
            ?>
            <?php else: ?>
            <?php
            echo "
                <li><a href='./login.php' class='navMenu logIn'>Войти</a></li>
                <li><a href='./signup.php' class='navMenu signUp'>Регистрация</a></li>";
            ?>
                <?php endif; ?>
                <?php
        echo "
        </ul>
    </nav>
    <div class='results'>";
if ($result->num_rows > 0) {
    while ($results = $result->fetch_assoc()) {

        $book_title = $results['book_title'];
        $book_author = $results['book_author'];
        $book_cover = $results['book_cover'];
        $book_link = $results['book_link'];

        echo "<div class='searchRes'>";
        echo "<a href=";
        print_r($book_link);
        echo " class='resLink'>";
        echo "<img src='./images/";
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
}
echo "</div>";
if ($totalPages > 1){
    echo '<div class="pages">';
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $pageNumber) {
    echo '<span class="current page">'.$i.'</span>';
    } else {
    echo '<a href="?page='.$i.'" class="page">'.$i.'</a>';
    }
    }
}
echo "</div>";
echo "</div>";

} catch (mysqli_sql_exception $e){
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Поиск</title>
        <link rel='icon' type='image/x-icon' href='images/image 2.png'>
        <link rel='stylesheet' href='searchResultsStyle.css'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
        <script defer src='script.js'></script>
    </head>
";
echo " <body>
<nav class='navBar'>
        <div>
            <a href='Library.php'>
                    <img class='logoImage' src='images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='search.php' method='get' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
                <input class='searchBar' name='find' type='text' placeholder='Название книги или имя автора'
                    maxlength='150' autocomplete='off' value=''>
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
            <img class='sun' src='images/sun.png' alt='theme'>
        </button>
        <ul class='dropdown'>
            <li><a href='./genres/list.php' class='genres' class='navMenu'>Жанры ▼</a>
                <div class='dropdown-content'>
                    <a href='./genres/textbook.php'>Учебники</a>
                    <a href='./genres/horror.php'>Ужасы</a>
                    <a href='./genres/fantasy.php'>Фантастика</a>
                    <a href='./genres/detective.php'>Детектив</a>
                    <a href='./genres/adventures.php'>Приключения</a>
                    <a href='./genres/novel.php'>Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href='./new.php' class='navMenu'>Новое</a></li>
            <li><a href='#' class='navMenu'>Рекомендуемое</a></li>
        </ul>
    </nav>
    <div class='results'>
    <h1 class='notFound'>По вашему запросу ничего не найдено</h1>
    </div>";
}
$conn->close();
echo "<footer>
<img src='images/image 3.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/youtubeLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/twitterLogo.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/tiktokLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/gmailLogo.png' alt='novsuLogo' style='object-fit: cover;'>
</footer>";
echo "</body>";
echo "</html>";
?>