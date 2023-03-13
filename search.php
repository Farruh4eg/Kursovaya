<?php
include_once('serverConnection.php');
?>
<?php
$query = $_GET['find'];
$query = htmlspecialchars($query);
$query = mysqli_real_escape_string($conn,$query);

//total number of search results found
$totalSearchResults = "SELECT COUNT(*) as total FROM books WHERE (book_title LIKE '%" . $query . "%') OR (book_author LIKE '%" . $query . "%')";
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
$sqlSearch = "SELECT * FROM books WHERE (book_title LIKE '%" . $query . "%') OR (book_author LIKE '%" . $query . "%') LIMIT $offset,$resultsPerPage";
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
        echo "<img src='images/";
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
        echo '<div class="pagination">';
        for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $pageNumber) {
        echo '<span class="current">'.$i.'</span>';
        } else {
        echo '<a href="?page='.$i.'">'.$i.'</a>';
        }
        }
        echo '</div>';
    echo "</div>";
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