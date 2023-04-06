<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link rel="icon" type="image/x-icon" href="images/image 2.png">
    <link rel="stylesheet" href="extendedSearch.css">
    <script defer src="script.js"></script>
</head>

<body>
    <nav class="navBar">
        <div>
            <a href="./Library.php">
                <button class="goToMainBtn">
                    <img class="logoImage" src="images/image 2.svg" alt="logo">
                </button>
            </a>
        </div>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img src="images/sun.png" alt="theme">
        </button>
    </nav>
    <form action="./extsearch.php" method="post" style="font-family:Montserrat;">
        <div class="container">
            <h1>Расширенный поиск</h1>
            <p>Введите критерии поиска</p>
            <hr>

            <label for="bookTitle"><b>Название книги</b></label>
            <input type="text" placeholder="Название книги" name="bookTitle" id="bookTitle">

            <label for="bookAuthor"><b>Автор книги</b></label>
            <input type="text" placeholder="Автор книги" name="bookAuthor" id="bookAuthor">

            <label for="bookReleaseYear"><b>Год выпуска</b></label>
            <input type="text" placeholder="Год выпуска" name="bookReleaseYear" id="bookReleaseYear">

            <label for="bookGenre"><b>Жанр книги</b></label>
            <input type="text" placeholder="Жанр книги" name="bookGenre" id="bookGenre">

            <div class="clearfix">
                <button type="submit" class="doSearch">Поиск</button>
            </div>
        </div>
    </form>
</body>

</html>