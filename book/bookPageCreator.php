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

$sql = "SELECT * FROM books";
$result = $conn->query($sql);

function getLink($url, $params = array(), $use_existing_arguments = false)
{
    if ($use_existing_arguments) $params = $params + $_GET;
    if (!$params) return $url;
    $link = $url;
    if (strpos($link, '?') === false) $link .= '?'; //If there is no '?' add one at the end
    elseif (!preg_match('/(\?|\&(amp;)?)\$/', $link)) $link .= '&amp;'; //If there is no '&' at the END, add one.

    $params_arr = array();
    foreach ($params as $key => $value) {
        if (gettype($value) == 'array') { //Handle array data properly
            foreach ($value as $val) {
                $params_arr[] = $key . '[]=' . urlencode($val);
            }
        } else {
            $params_arr[] = $key . '=' . urlencode($value);
        }
    }
    $link .= implode('&amp;', $params_arr);

    return $link;
}

// Create a new PHP file for each book
while ($row = $result->fetch_assoc()) {

    $book_id = $row['id'];
    $book_title = $row['book_title'];
    $book_author = $row['book_author'];
    $book_description = $row['book_description'];
    $book_cover = $row['book_cover'];
    $book_release_year = $row['book_release_year'];
    $book_genres = $row['book_genres'];
    $book_downloads = $row['book_downloads'];
    $book_file = $row['book_file'];
    $tempLink = getLink(
        './book/',
        array(
            $book_id
        )
    );
    $book_link = str_replace('?0=', '', $tempLink) . '.php';

    // Create the new PHP file
    $file_name = $book_id . '.php';
    $file_handle = fopen($file_name, 'w') or die('Cannot open file:  ' . $file_name);

    // Write the HTML page to the file
    $html_page = '
<?php
include_once(\'../serverConnection.php\');

session_start();

if(!isset($_SESSION["count"])) {
    $_SESSION["logged_in"] = false;
} else {
    $_SESSION["logged_in"] = true;
}

$downloadsQ = "SELECT book_downloads FROM books WHERE id = ' . $book_id . ' ;";
$resDown = $conn->query($downloadsQ);
$row = $resDown->fetch_assoc();
$bookDown = $row[\'book_downloads\'];
?>
<?php
echo "
<!DOCTYPE html>
<html lang=\'en\'>
<head>
    <meta charset=\'UTF-8\'>
    <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
    <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'>
    <title>";
    print_r("' . $book_title . '");
    echo "</title>
    <link rel=\'icon\' type=\'image/x-icon\' href=\'../images/image 2.png\'>
    <link rel=\'stylesheet\' href=\'../bookPageStyle.css\'>
    <link rel=\'preconnect\' href=\'https://fonts.googleapis.com\'>
    <link rel=\'preconnect\' href=\'https://fonts.gstatic.com\' crossorigin>
    <link href=\'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap\' rel=\'stylesheet\'>
    <link href=\'https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap\' rel=\'stylesheet\'>
    <link href=\'https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap\' rel=\'stylesheet\'>
    <script defer src=\'../script.js\'></script>
</head> ";
    
echo "<body>
    <nav class=\'navBar\'>
        <div>
            <a href=\'../library.php\'>
                    <img class=\'logoImage\' src=\'../images/image 2.svg\' alt=\'logo\'>
            </a>
        </div>
        <form action=\'../search.php\' method=\'get\' id=\'search\' class=\'searchTag\' style=\'display:flex; margin-left:2rem;\'>
                <input class=\'searchBar\' name=\'find\' type=\'text\' placeholder=\'Название книги или имя автора\'
                    maxlength=\'150\' autocomplete=\'off\' value=\'\' >
            <button class=\'searchButton\' style=\'padding:0;\'>
                <img class=\'lupaImage\' src=\'../images/magnifyingGlassIcon.png\' alt=\'magnifyingGlass\'>
            </button>
            <div id=\'sfac_cont\'>
                <div id=\'nspotlight\' class=\'nspotlight\' style=\'display: none;\'></div>
            </div>
        </form>
        <a href=\'../extendedSearch.php\' style=\'width: 24px; height: 28px;\'>
            <svg class=\'entended\' xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 512 512\' style=\'width: 100%; height: 100%\'>
                <path fill=\'#fff\' d=\'M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z\' />
            </svg>
        </a>
        <button onclick=\'changeThemeColor()\' id=\'changeThemeImage\' class=\'changeThemeButton\'>
            <img class=\'sun\' src=\'../images/sun.png\' alt=\'theme\'>
        </button>
        <ul class=\'dropdown\'>
            <li><a href=\'../genres/list.php\' class=\'genres\' class=\'navMenu\'>Жанры ▼</a>
                <div class=\'dropdown-content\'>
                    <a href=\'../genres/textbook.php\'>Учебники</a>
                    <a href=\'../genres/horror.php\'>Ужасы</a>
                    <a href=\'../genres/fantasy.php\'>Фантастика</a>
                    <a href=\'../genres/detective.php\'>Детектив</a>
                    <a href=\'../genres/adventures.php\'>Приключения</a>
                    <a href=\'../genres/novel.php\'>Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href=\'../new.php\' class=\'navMenu\'>Новое</a></li>
            <li><a href=\'#\' class=\'navMenu\'>Рекомендуемое</a></li>";
            ?>

            <?php if ($_SESSION["logged_in"]) : ?>
            <?php
            echo "
                <li><a href=\'../signOut.php\' class=\'navMenu signOut\'>Выйти </a></li>";
            ?>
            <?php else: ?>
            <?php
            echo "
                <li><a href=\'../login.php\' class=\'navMenu logIn\'>Войти</a></li>
                <li><a href=\'../signup.php\' class=\'navMenu signUp\'>Регистрация</a></li>";
            ?>
                <?php endif; ?>
            <?php
        echo "
        </ul>
    </nav>";
    echo " <div class=\'bookPage\'>";
    echo " <div class=\'imgAndLink\'>";
    echo " <img src= \'../images/";
    print_r("' . $book_cover . '");
    echo " \' alt=\'bookCover\'>";
    ?>
    <?php
    if ($_SESSION["logged_in"]) {
    echo " <a href=";
    print_r("'.$book_file. '");
    echo " download onclick=\'increment()\'class=\'downloadbook\'>";
    echo " Скачать книгу";
    echo " </a>";
    } else {
    echo " <p class=\'auth\'>";
    echo " Для скачивания книги, войдите в свою учетную запись";
    echo " </p>";
    }
    ?>
    <?php
    echo " </div>";
    echo " <div class=\'bookInfo\'> ";
    echo "<p class=\'info\' style=\'font-size: 18px;\'> <span class=\'infoRow\'>Название книги: </span>";
    print_r("' . $book_title . '");
    echo "</p>";
    echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Автор: </span>";
    print_r("' . $book_author . '");
    echo "</p>";
    echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Год выпуска: </span>";
    print_r("' . $book_release_year . '");
    echo "</p>";
    echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Количество скачиваний: </span>";
    echo " $bookDown";
    echo "</p>";
    echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Жанры: </span>";
    print_r("' . $book_genres . '");
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = \'description\'>";
    echo "<h1>Описание</h1>";
    echo "<p class=\'info\' style=\'font-size: 21px;\'>";
    print_r("' . $book_description . '");
    echo "</p>";
    echo "<input type=\'hidden\' id=\'hidden_id\' name=\'hidden_id\' class=\'hidden_id\' value=";
    print_r("' .$book_id . '");
    echo ">";
    echo "</div>";
echo "</body>";
echo "</html>";
?>';

    $query = "UPDATE books SET book_link = '$book_link' WHERE id = $book_id";
    $upload = mysqli_query($conn, $query);

    fwrite($file_handle, $html_page);
    fclose($file_handle);
}

// Close the database connection
$conn->close();
