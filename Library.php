<?php

include('login.php');

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
            <a href="Library.html">
                    <img class="logoImage" src="images/image 2.svg" alt="logo">
            </a>
        </div>
        <form action="search.php" method="get" id="search" class="searchTag" style="display:flex; margin-left:2rem;">
            <div id="temp">
                <input class="searchBar" name="find" type="text" placeholder="Название книги или имя автора"
                    maxlength="150" autocomplete="off" value="" style="  font-family: 'Nunito Sans', sans-serif;
">
            </div>
            <button class="searchButton" style="padding:0;">
                <img class="lupaImage" src="images/magnifyingGlassIcon.png" alt="magnifyingGlass">
            </button>
            <div id="sfac_cont">
                <div id="nspotlight" class="nspotlight" style="display: none;"></div>
            </div>
        </form>

        <a href="#" name="srchBtn" class="srchBtn">

        </a>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img src="images/sun.png" alt="theme">
        </button>
        <ul class="dropdown">
            <li><a href="#" class="genres" class="navMenu">Жанры ▼</a>
                <div class="dropdown-content">
                    <a href="#">Учебники</a>
                    <a href="#">Ужасы</a>
                    <a href="#">Фантастика</a>
                    <a href="#">Детектив</a>
                    <a href="#">Приключения</a>
                    <a href="#">Роман</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href="#" class="navMenu">Новое</a></li>
            <li><a href="#" class="navMenu">Рекомендуемое</a></li>
            <?php if (!isset($_SESSION["logged_in"])): ?>
            <li><a href="login.php" class="navMenu logIn">Войти</a></li>
            <li><a href="signup.php" class="navMenu signUp">Регистрация</a></li>
            <?php else: ?>
            <li><a href="signout.php" class="navMenu signOut">Выйти </a></li>
            <?php endif; ?> 
        </ul>
    </nav>
    <div class="bookContainer">
        <div class="book" style="z-index: 5;">
            <img src="images/bookCoverOne.jpg" width="300px" height="450px" alt="bookCoverOne">
            <p style="padding-left:0;">Роман "Дюна", первая книга прославленной саги, знакомит читателя с Арракисом -
                миром суровых пустынь, исполинских песчаных червей, отважных фрименов и таинственной специи.
                Безграничная фантазия автора создала яркую, почти осязаемую вселенную, в которой есть враждующие Великие
                Дома, могущественная Космическая Гильдия, загадочный Орден Бинэ Гессерит и неуловимые ассасины.
            </p>
            <a href="#" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookOne">
                    Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 4;">
            <img src="images/bookCoverTwo.jpg" width="300px" height="450px" alt="bookCoverTwo">
            <p style="padding-left:0;">Роман, ставший основой легендарного фильма Стивена Спилберга. Фильма, который
                открыл "эру блокбастеров" и навсегда изменил облик голливудской киноиндустрии. Похоже, курортному
                городку Эмити придется распрощаться с беззаботной размеренной жизнью. Найден труп пропавшей накануне
                девушки — она растерзана акулой. Шеф местной полиции Мартин Броуди закрывает пляжи во избежание новых
                трагедий, однако городские власти отменяют его решение и делают все, чтобы скрыть факт жуткой гибели:
                ведь Эмити живет туристическим бизнесом. Но акула не уходит, она кормится здесь. И вот — новые жертвы.
                Чтобы справиться с хищником, приглашен специалист по акулам Мэтт Хупер. И если морское чудовище
                терроризирует весь городок, то появление Хупера несет опасность лично для Броуди…
            </p>
            <a href="#" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookTwo">
                    Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 3;">
            <img src="images/bookCoverThree.jfif" width="300px" height="450px" alt="bookCoverThree">
            <p style="padding-left:0;">Лето перед последним курсом обучения Гарри в Хогвартсе. Раскол в волшебном мире
                произошёл окончательно, и сторонники Волан-де-Морта становятся всё сильнее. Служащие министерства магии
                один за другим подчиняются им, а новым директором Хогвартса стал Северус Снегг, убивший Дамблдора. Гарри
                Поттер пока скрывается от врагов, однако они подбираются к нему всё ближе. А ведь просто отсиживаться в
                безопасном месте он не может – необходимо найти крестражи, содержащие части души Волан-де-Морта, не
                уничтожив которые, нельзя надеяться на победу. Гарри принимает решение не возвращаться в школу и вместо
                этого вместе с друзьями отправляется на поиски.
            </p>
            <a href="book/3.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookThree">
                    Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 2;">
            <img src="images/bookCoverFour.jfif" width="300px" height="450px" alt="bookCoverFour">
            <p style="padding-left:0;">«Тринадцатый круг» — это эмоционально захватывающая биография, наполненная
                соблазнительными мрачными образами и смелыми признаниями. Обязательна к прочтению любителям реальных
                воспоминаний и заставляющих задуматься стихов.
            </p>
            <a href="#" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookFour">
                    Подробнее
            </a>
        </div>
        <div class="book" style="z-index: 1;">
            <img src="images/bookCoverFive.jpg" width="300px" height="450px" alt="bookCoverFive">
            <p style="padding-left:0;">«Чужак» — это роман о человеке по имени Терри Мейтленд, которого обвиняют в
                страшном преступлении — в убийстве одиннадцатилетнего Фрэнка Питерсона. Против него собраны
                неопровержимые улики, но у него есть железобетонное алиби — в день убийства он был в другом городе на
                глазах сотен свидетелей.
            </p>
            <a href="book/1.php" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;" class="carouselBookFive">
                    Подробнее
            </a>
        </div>
    </div>
    <article class="aboutProject">
        <h1 class="aboutProj" >О проекте</h1>
        <p class="paragraphAboutProject">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, provident? Sequi
            eveniet at impedit corrupti nemo tempora sit, officia repellendus voluptas laborum sint nam animi eum. Esse
            sed tempora blanditiis.
            Enim, possimus accusamus. Deleniti voluptatem non ut quam ipsam consectetur in nesciunt sit itaque quos
            inventore quod, ullam explicabo nemo soluta debitis ab accusamus possimus ea quas velit quaerat eos.
            Voluptatem, ea repellat? Corporis voluptates ad fugiat pariatur aliquam neque sint a, aut ipsum consequatur
            modi sed libero aspernatur eum magni tempore ipsam minima placeat. Iste, ullam. Alias, quo obcaecati.
            Tenetur dolorum velit, blanditiis delectus quae architecto officia? Laudantium repellat, delectus aut
            commodi magni veritatis ullam sit. Voluptas, deleniti sapiente, officia ad expedita est vero libero
            cupiditate repellat maxime porro.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea neque provident tenetur ex quo quidem, cumque
            at qui consectetur illo impedit ipsam. Nobis aut quas cumque facere voluptatum distinctio minus.
            Eos iusto quia sit aut eaque tempora sint recusandae aliquam facere, dolor quo itaque labore sapiente
            eveniet delectus ipsa! Delectus molestiae expedita numquam quos aspernatur nihil magni, deleniti
            voluptatibus aperiam.
            </p>
        <a href="explorer.html" style="width:max-content;cursor:pointer;padding:8px; border-radius:10px; background-color:Blue;font-weight:bold;font-size:13px; color:white; font-family:Montserrat;">
                Подробнее
        </a>
    </article>
    <h1 class="popular">Популярное</h1>
    <div class="popularBooks">
        <a href="#" class="bookHidden">
            <img src="images/bookCoverOne.jpg" alt="bookOne" style="object-fit: cover;">
        </a>
        <a href="#" class="bookHidden">
            <img src="images/bookCoverTwo.jpg" alt="bookTwo" style="object-fit: cover;">
        </a>
        <a href="#" class="bookHidden">
            <img src="images/bookCoverThree.jfif" alt="bookThree" style="object-fit: cover;">
        </a>
        <a href="#" class="bookHidden">
            <img src="images/bookCoverFour.jfif" alt="bookFour" style="object-fit: cover;">
        </a>
        <a href="#" class="bookHidden">
            <img src="images/bookCoverFive.jpg" alt="bookFive" style="object-fit: cover;">
        </a>
    </div>
    <footer>
        <img src="images/image 3.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="images/youtubeLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="images/twitterLogo.png" alt="novsuLogo" style="object-fit: cover;">
        <img src="images/tiktokLogo.svg" alt="novsuLogo" style="object-fit: cover;">
        <img src="images/gmailLogo.png" alt="novsuLogo" style="object-fit: cover;">
    </footer>

</body>

</html>