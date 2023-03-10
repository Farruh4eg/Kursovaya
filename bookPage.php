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

$result = mysqli_query($conn, "SELECT * FROM books");

/**
 * Create a link by joining the given URL and the parameters given as the second argument.
 * Arguments :  $url - The base url.
 *                $params - An array containing all the parameters and their values.
 *                $use_existing_arguments - Use the parameters that are present in the current page
 * Return : The new url.
 * Example : 
 *            getLink("http://www.google.com/search",array("q"=>"binny","hello"=>"world","results"=>10));
 *                    will return
 *            http://www.google.com/search?q=binny&amp;hello=world&amp;results=10
 */
function getLink($url, $params = array(), $use_existing_arguments = false)
{
    if ($use_existing_arguments) $params = $params + $_GET;
    if (!$params) return $url;
    $link = $url;
    if (strpos($link, '?') === false) $link .= '?'; //If there is no '?' add one at the end
    elseif (!preg_match('/(\?|\&(amp;)?)$/', $link)) $link .= '&amp;'; //If there is no '&' at the END, add one.

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



while ($row = mysqli_fetch_array($result)) {
    $bookId = $row['id'];
    $tempLink = getLink(
        'http://www.localhost/Kursach/book/',
        array(
            $bookId
        )
    );
    $book_link = str_replace('?0=', '', $tempLink) . '.php';

    echo " <!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>";
    print_r($row['book_title']);
    echo "</title>
    <link rel='icon' type='image/x-icon' href='images/image 2.png'>
    <link rel='stylesheet' href='booktest.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap' rel='stylesheet'>
    <script defer src='script.js'></script>
    </head> ";

    echo "<body>
    <nav class='navBar'>
        <div>
            <a href='Library.html'>
                    <img class='logoImage' src='images/image 2.svg' alt='logo'>
            </a>
        </div>
        <form action='/search' id='search' class='searchTag' style='display:flex; margin-left:2rem;'>
            <div id='temp'>
                <input class='searchBar' name='find' type='text' placeholder='???????????????? ?????????? ?????? ?????? ????????????'
                    maxlength='150' autocomplete='off' value=''>
            </div>
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
            <li><a href='#' class='genres' class='navMenu'>?????????? ???</a>
                <div class='dropdown-content'>
                    <a href='#'>????????????????</a>
                    <a href='#'>??????????</a>
                    <a href='#'>????????????????????</a>
                    <a href='#'>????????????????</a>
                    <a href='#'>??????????????????????</a>
                    <a href='#'>??????????</a>
                </div>
            </li>
        </ul>
        <ul>
            <li><a href='#' class='navMenu'>??????????</a></li>
            <li><a href='#' class='navMenu'>??????????????????????????</a></li>
            <li><a href='login.php' class='navMenu logIn'>??????????</a></li>
            <li><a href='signup.php' class='navMenu signIn'>??????????????????????</a></li>
        </ul>
    </nav>";
    echo " <div class='bookPage'> ";
    echo " <div class='imgAndLink'>";
    echo " <img src= images/";
    print_r($row['book_cover']);
    echo " alt='bookCover'>";
    echo " <a href='script.js' download class='downloadbook'>";
    echo " ?????????????? ??????????";
    echo " </a>";
    echo " </div>";
    echo " <div class='bookInfo'> ";
    echo "<p class='info' style='font-size: 20px;'> <span class='infoRow'>???????????????? ??????????: </span>";
    print_r($row['book_title']);
    echo "</p>";
    echo "<p class='info' style='font-size: 20px;'><span class='infoRow'>??????????: </span>";
    print_r($row['book_author']);
    echo "</p>";
    echo "<p class='info' style='font-size: 20px;'><span class='infoRow'>?????? ??????????????: </span>";
    print_r($row['book_release_year']);
    echo "</p>";
    echo "<p class='info' style='font-size: 20px;'><span class='infoRow'>???????????????????? ????????????????????: </span>";
    print_r($row['book_downloads']);
    echo "</p>";
    echo "<p class='info' style='font-size: 20px;'><span class='infoRow'>??????????: </span>";
    print_r($row['book_genres']);
    echo "</p>";
    echo "</div>";
    echo "</div> ";
    echo "<div class = 'description'>";
    echo "<h1>????????????????</h1>";
    echo "<p class='info' style='font-size: 21px;'>";
    print_r($row['book_description']);
    echo "</p>";
    echo "</div>";
    echo "</body>";
    echo "</html>";

    $query = "UPDATE books SET book_link = '$book_link' WHERE id = $bookId";
    $upload = mysqli_query($conn, $query);
}

mysqli_close($conn);
