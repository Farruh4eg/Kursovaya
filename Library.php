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
$sql = "SELECT * FROM books ORDER BY book_downloads DESC LIMIT 4";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Библиотека политехнического колледжа НовГУ</title>
    <link rel="icon" type="image/x-icon" href="images/image 2.png">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>

<body>
    <nav class="navBar">
        <div>
            <a href="./Library.php">
                <img class="logoImage" src="images/image 2.svg" alt="logo">
            </a>
        </div>
        <form action="./search.php" method="get" id="search" class="searchTag" style="display:flex; margin-left:2rem;">
            <input class="searchBar" name="find" type="text" placeholder="Название книги или имя автора" maxlength="150" autocomplete="off" value="" style="  font-family: 'Nunito Sans', sans-serif;
">
            <button class="searchButton" style="padding:0;">
                <img class="lupaImage" src="images/magnifyingGlassIcon.png" alt="magnifyingGlass">
            </button>
            <div id="sfac_cont">
                <div id="nspotlight" class="nspotlight" style="display: none;"></div>
            </div>
        </form>
        <a href="./extendedSearch.php" style="width: 24px; height: 28px; margin-left: 1rem">
            <svg class='entended' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 100%; height: 100%">
                <path fill="#fff" d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z" />
            </svg>
        </a>

        <a href="#" name="srchBtn" class="srchBtn">

        </a>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img class="sun" src="./images/sun.png" alt="theme">
        </button>
        <ul class="dropdown">
            <li><a href="./genres/list.php" class="genres" class="navMenu">Жанры ▼</a>
                <div class="dropdown-content">
                    <a href="./genres/textbook.php">Учебники</a>
                    <a href="./genres/horror.php">Ужасы</a>
                    <a href="./genres/fantasy.php">Фантастика</a>
                    <a href="./genres/detective.php">Детектив</a>
                    <a href="./genres/adventures.php">Приключения</a>
                    <a href="./genres/novel.php">Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href="./new.php" class="navMenu">Новое</a></li>
            <li><a href="#" class="navMenu">Рекомендуемое</a></li>
            <?php if (($_SESSION["logged_in"] == true)) : ?>
                <li><a href="./signOut.php" class="navMenu signOut">Выйти </a></li>
            <?php else : ?>
                <li><a href="./login.php" class="navMenu logIn">Войти</a></li>
                <li><a href="./signup.php" class="navMenu signUp">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="bookContainer">
        <div class="book" style="z-index: 5;">
            <img src="images/Dune.jpg" width="300px" height="450px" alt="Dune">
            <p style="padding-left:0;">Роман "Дюна", первая книга прославленной саги, знакомит читателя с Арракисом -
                миром суровых пустынь, исполинских песчаных червей, отважных фрименов и таинственной специи.
                Безграничная фантазия автора создала яркую, почти осязаемую вселенную, в которой есть враждующие Великие
                Дома, могущественная Космическая Гильдия, загадочный Орден Бинэ Гессерит и неуловимые ассасины.
            </p>
            <a href="./book/5.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookOne">
                Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 4;">
            <img src="./images/Jaws.jpg" width="300px" height="450px" alt="Jaws">
            <p style="padding-left:0;">Роман, ставший основой легендарного фильма Стивена Спилберга. Фильма, который
                открыл "эру блокбастеров" и навсегда изменил облик голливудской киноиндустрии. Похоже, курортному
                городку Эмити придется распрощаться с беззаботной размеренной жизнью. Найден труп пропавшей накануне
                девушки — она растерзана акулой. Шеф местной полиции Мартин Броуди закрывает пляжи во избежание новых
                трагедий, однако городские власти отменяют его решение и делают все, чтобы скрыть факт жуткой гибели:
                ведь Эмити живет туристическим бизнесом. Но акула не уходит, она кормится здесь. И вот — новые жертвы.
                Чтобы справиться с хищником, приглашен специалист по акулам Мэтт Хупер. И если морское чудовище
                терроризирует весь городок, то появление Хупера несет опасность лично для Броуди…
            </p>
            <a href="./book/17.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookTwo">
                Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 3;">
            <img src="images/HarryPotterAndTheDeathlyHallows.jfif" width="300px" height="450px" alt="HarryPotter">
            <p style="padding-left:0;">Лето перед последним курсом обучения Гарри в Хогвартсе. Раскол в волшебном мире
                произошёл окончательно, и сторонники Волан-де-Морта становятся всё сильнее. Служащие министерства магии
                один за другим подчиняются им, а новым директором Хогвартса стал Северус Снегг, убивший Дамблдора. Гарри
                Поттер пока скрывается от врагов, однако они подбираются к нему всё ближе. А ведь просто отсиживаться в
                безопасном месте он не может – необходимо найти крестражи, содержащие части души Волан-де-Морта, не
                уничтожив которые, нельзя надеяться на победу. Гарри принимает решение не возвращаться в школу и вместо
                этого вместе с друзьями отправляется на поиски.
            </p>
            <a href="./book/3.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookThree">
                Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 2;">
            <img src="images/Собачье_Сердце.jpg" width="300px" height="450px" alt="bookCoverFour">
            <p style="padding-left:0;">Собачье сердце" Михаила Булгакова - это ироническая сатира на людей,
                стремящихся изменить свою природу. Главный герой - профессор
                Филипп Филиппович Премудрый - превращает бездомную собаку Шарика в человека,
                в результате чего Шарик получает ум и голос, но остается с внешностью собаки.
                Шарик-человек становится протеже Преображенского института,
                который проводит над ним эксперименты.
            </p>
            <a href="./book/19.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookFour">
                Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 1;">
            <img src="images/Outsider.jpg" width="300px" height="450px" alt="Outsider">
            <p style="padding-left:0;">«Чужак» — это роман о человеке по имени Терри Мейтленд, которого обвиняют в
                страшном преступлении — в убийстве одиннадцатилетнего Фрэнка Питерсона. Против него собраны
                неопровержимые улики, но у него есть железобетонное алиби — в день убийства он был в другом городе на
                глазах сотен свидетелей.
            </p>
            <a href="./book/1.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookFive">
                Подробнее
            </a>
        </div>
    </div>
    <article class="aboutProject">
        <h1 class="aboutProj">О проекте</h1>
        <p class="paragraphAboutProject">
            Проект представляет собой инновационную онлайн-библиотеку,
            разработанную студентом колледжа. Это курсовая работа,
            направленная на создание инструмента, который будет полезен для учеников
            и преподавателей в учебном процессе. Проект предоставляет пользователям доступ не только к учебной литературе,
            но и к большому количеству художественных произведений. С ее помощью студенты и
            преподаватели могут легко найти необходимую литературу по жанрам, авторам и названию.
            Этот инструмент значительно облегчает процесс самообразования и обеспечивает широкий доступ к знаниям.
        </p>
    </article>
    <div style="justify-content:center; align-items: center; margin-bottom: 50px">
    <a href="./popular.php" class="popular">Популярное</a>
    </div>
    <?php
    echo '<div class="popularBooks" style="gap:10px">';
    foreach ($result as $row) {
        echo '<div class="bookPop">';
        echo '<a href="' . $row['book_link'] . '" class="popularLink">';
        echo '<img src="./images/' . $row['book_cover'] . '">';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
    ?>
    </div>
    <footer>
        <img src="./images/image 3.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="./images/youtubeLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="./images/twitterLogo.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="./images/tiktokLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="./images/gmailLogo.png" alt="novsuLogo" style="object-fit: cover;">
    </footer>

</body>

</html>