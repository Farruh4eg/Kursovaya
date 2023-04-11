<?php
session_start();
include_once('loginConnection.php');
?>

<?php
try {
    if (!isset($_SESSION['isAdmin'])) {
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
        <link rel='stylesheet' href='shared_responsive_style.css'>
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
        <div style='display: flex; align-content: center; align-items: center;'>
            <a href='Library.php'>
                    <img class='logoImage' src='images/image 2.svg' alt='logo'>
            </a>
        </div>
       
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img class='sun' src='images/sun.png' alt='theme'>
        </button>";
        ?>
        <?php
        echo "
        </ul>
    </nav>
    <div class='error' style='display: flex; justify-content: center; height: 100svh'>
    <h1>У вас недостаточно прав</h1>
    </div>";
        echo "<footer style='position: absolute;'>
<img src='images/image 3.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/youtubeLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/twitterLogo.png' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/tiktokLogo.svg' alt='novsuLogo' style='object-fit: cover;'>
<img src='images/gmailLogo.png' alt='novsuLogo' style='object-fit: cover;'>
</footer>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Загрузить</title>
    <link rel='icon' type='image/x-icon' href='images/image 2.png'>
    <link rel='stylesheet' href='uploadstyle.css'>
    <script defer src='script.js'></script>
</head>

<body>
    <nav class='navBar'>
        <div style='display: flex; align-content: center; align-items: center;'>
            <a href='./Library.php'>
                    <img class='logoImage' src='images/image 2.svg' alt='logo'>
            </a>
        </div>
        <button onclick='changeThemeColor()' id='changeThemeImage' class='changeThemeButton'>
            <img src='images/sun.png' alt='theme'>
        </button>
    </nav>
    <form action='upload.php' method='post' style='font-family:Montserrat;'>
        <div class='container'>
            <input type='text' name='book_title' placeholder='Название книги'>
            <input type='text' name='book_author' placeholder='Имя автора книги'>
            <input type='text' name='book_release_year' placeholder='Год выхода книги'>
            <input type='text' name='book_genres' placeholder='Жанры книги'>
            <input type='file' name='book_cover' placeholder='Обложка книги' width='max-content'>
            <input type='text' name='book_file' placeholder='Ссылка на файл книги' value='/kursach/book/bookFiles/'>
            <input type='text' name='book_description' placeholder='Описание книги'>
            <div class='clearfix'>
                <button type='submit' class='submitbtn'>Загрузить</button>
            </div>
        </div>
    </form>
</body>

</html>";
    }
} catch (Throwable $e) {
    echo "Not admin";
}
?>