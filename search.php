<?php
include_once('serverConnection.php');
?>
<?php
$query = $_GET['find'];
$query = htmlspecialchars($query);
$query = mysqli_real_escape_string($conn,$query);
$sqlSearch = "SELECT * FROM books WHERE (book_title LIKE '%" . $query . "%') OR (book_author LIKE '%" . $query . "%')";
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
        <form action='/search' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
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
    echo "</div>";
$conn->close();
echo "</body>";
echo "</html>";
?>