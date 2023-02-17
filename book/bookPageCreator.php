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

    $tempLink = getLink(
        'http://www.localhost/Kursach/book/',
        array(
            $book_id
        )
    );
    $book_link = str_replace('?0=', '', $tempLink) . '.php';

    // Create the new PHP file
    $file_name = $book_id . '.php';
    $file_handle = fopen($file_name, 'w') or die('Cannot open file:  '.$file_name);
    
    // Write the HTML page to the file
$html_page = '
<?php
echo "
<!DOCTYPE html>
    <html lang=\'en\'>
    <head>
        <meta charset=\'UTF-8\'>
        <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
        <meta name=\'viewport\' content=\'width=device-width, initial-scale=1.0\'>
        <title>";
        print_r(\''.$book_title.'\');
        echo "</title>
        <link rel=\'icon\' type=\'image/x-icon\' href=\'../images/image 2.png\'>
        <link rel=\'stylesheet\' href=\'../bookPageStyle.css\'>
        <script defer src=\'../script.js\'></script>
        </head> ";
    
        echo "<body>
        <nav class=\'navBar\'>
            <div>
                <a href=\'../Library.html\'>
                    <button class=\'goToMainBtn\'>
                        <img class=\'logoImage\' src=\'../images/image 2.png\' alt=\'logo\'>
                    </button>
                </a>
            </div>
            <form action=\'/search\' id=\'search\' class=\'searchTag\' style=\'display:flex; margin-left:2rem;\'>
                <div id=\'temp\'>
                    <input class=\'searchBar\' name=\'find\' type=\'text\' placeholder=\'Название книги или имя автора\'
                        maxlength=\'150\' autocomplete=\'off\' value=\'\'>
                </div>
                <button class=\'searchButton\' style=\'padding:0;\'>
                    <img class=\'lupaImage\' src=\'../images/magnifyingGlassIcon.png\' alt=\'magnifyingGlass\'>
                </button>
                <div id=\'sfac_cont\'>
                    <div id=\'nspotlight\' class=\'nspotlight\' style=\'display: none;\'></div>
                </div>
            </form>
    
            <a href=\'#\' name=\'srchBtn\' class=\'srchBtn\'>
    
            </a>
            <button onclick=\'changeThemeColor()\' id=\'changeThemeImage\' class=\'changeThemeButton\'>
                <img src=\'../images/sun.png\' alt=\'theme\'>
            </button>
            <ul class=\'dropdown\'>
                <li><a href=\'#\' class=\'genres\' class=\'navMenu\'>Жанры ▼</a>
                    <div class=\'dropdown-content\'>
                        <a href=\'#\'>Учебники</a>
                        <a href=\'#\'>Ужасы</a>
                        <a href=\'#\'>Фантастика</a>
                        <a href=\'#\'>Детектив</a>
                        <a href=\'#\'>Приключения</a>
                        <a href=\'#\'>Роман</a>
                    </div>
                </li>
            </ul>
            <ul>
                <li><a href=\'#\' class=\'navMenu\'>Новое</a></li>
                <li><a href=\'#\' class=\'navMenu\'>Рекомендуемое</a></li>
                <li><a href=\'login.php\' class=\'navMenu logIn\'>Войти</a></li>
                <li><a href=\'signup.php\' class=\'navMenu signIn\'>Регистрация</a></li>
            </ul>
        </nav>";
        echo " <div class=\'bookPage\'>";
        echo " <img src= \'../images/";
        print_r(\''.$book_cover.'\');
        echo " \' alt=\'bookCover\'>";
        echo " <div class=\'bookInfo\'> ";
        echo "<p class=\'info\' style=\'font-size: 18px;\'> <span class=\'infoRow\'>Название книги: </span>";
        print_r(\''.$book_title.'\');
        echo "</p>";
        echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Автор: </span>";
        print_r(\''.$book_author.'\');
        echo "</p>";
        echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Год выпуска: </span>";
        print_r(\''.$book_release_year.'\');
        echo "</p>";
        echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Количество скачиваний: </span>";
        print_r(\''.$book_downloads.'\');
        echo "</p>";
        echo "<p class=\'info\' style=\'font-size: 18px;\'><span class=\'infoRow\'>Жанры: </span>";
        print_r(\''.$book_genres.'\');
        echo "</p>";
        echo "</div>";
        echo "</div> ";
        echo "<div class = \'description\'>";
        echo "<h1>Описание</h1>";
        echo "<p class=\'info\' style=\'font-size: 21px;\'>";
        print_r("'.$book_description.'");
        echo "</p>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    ?>';
    
    $query = "UPDATE books SET book_link = '$book_link' WHERE id = $book_id";
    $upload = mysqli_query($conn,$query);
	
    fwrite($file_handle, $html_page);
    fclose($file_handle);
}

// Close the database connection
$conn->close();


?>