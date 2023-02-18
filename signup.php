<?php

$showAlert = false;
$showError = false;
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    include 'serverConnection.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $sql = "Select * from users where username='$username'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if ($num == 0) {
        if (($password == $cpassword) && $exists == false) {

            $sql = "INSERT INTO `users` ( `username`, 
                `password`, `date`) VALUES ('$username', 
                '$password', current_timestamp())";

            $result = mysqli_query($conn, $sql);

            if ($result) {

                echo " <div id='hideAlert' class='alert alert-success 
                alert-dismissible fade show' role='alert'>
        
                 Ваша учётная запись создана успешно! Вы будете перенаправлены на страницу входа через 3 секунды.
                
                </div> ";
                header("refresh:3;url=login.php");
            }
        } else {
            $showError = "Passwords do not match";
        }
    } // end if 

    if ($num > 0) {
        $exists = "Username not available";
    }
} //end if   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зарегистрироваться</title>
    <link rel="icon" type="image/x-icon" href="images/image 2.png">
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="signupstyle.css">
</head>

<body>
    <?php


    if ($showError) {

        echo " <div id='hideAlert' class='alert alert-danger 
            alert-dismissible fade show' role='alert'> 
        <strong>Ошибка!</strong> '. $showError.'
    
       
     </div> ";
    }

    if ($exists) {
        echo ' <div id="hideAlert" class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Ошибка!</strong> ' . $exists . '
        
       </div> ';
    }

    ?>
    <nav class="navBar">
        <div>
            <a href="Library.html">
                <button class="goToMainBtn">
                    <img class="logoImage" src="images/image 2.svg" alt="logo">
                </button>
            </a>
        </div>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img src="images/sun.png" alt="theme">
        </button>
    </nav>
    <form action="signup.php" method="post" style="font-family:Montserrat;">
        <div class="container">
            <h1>Регистрация</h1>
            <p>Пожалуйста заполните следующие поля, чтобы создать учётную запись</p>
            <hr>

            <label for="username"><b>Логин</b></label>
            <input type="text" id="username" placeholder="Введите логин" name="username" required>

            <label for="password"><b>Пароль</b></label>
            <input type="password" placeholder="Введите пароль" id="password" name="password" required>

            <label for="cpassword"><b>Повторите пароль</b></label>
            <input type="password" id="cpassword" placeholder="Повторите пароль" name="cpassword" required>



            <p>Уже есть учётная запись? <a href="Login.php" style="color:dodgerblue">Войти</a>.</p>
            <p>Создавая учётную запись, вы принимаете наши <a href="TermsAndConditions.html" style="color:dodgerblue">Условия конфиденциальности</a>.</p>

            <div class="clearfix">
                <button type="submit" class="signupbtn">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</body>

</html>