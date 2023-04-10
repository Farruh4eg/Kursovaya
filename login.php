<?php

include_once('loginConnection.php');

session_start();

function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = test_input($_POST["username"]);
    $stmt = $conn->prepare("SELECT password, salt, privileges FROM users WHERE username = '$username'");
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user) {
        $password = $_POST["password"] . $user['salt'];
        if (password_verify($password, $user['password'])) 
        {
            header("location: Library.php");
            $_SESSION["count"] = 1;
            $_SESSION['isAdmin'] = 0;
            if($user['privileges'] == 'admin') {
                $_SESSION["isAdmin"] = 1;
            }
            exit();
        } else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            exit();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
    <link rel="icon" type="image/x-icon" href="images/image 2.png">
    <link rel="stylesheet" href="loginstyle.css">
    <script defer src="script.js"></script>
</head>

<body>
    <nav class="navBar">
        <div>
            <a href="./Library.php">
                <button class="goToMainBtn">
                    <img class="logoImage" src="./images/image 2.svg" alt="logo">
                </button>
            </a>
        </div>
        <button onclick="changeThemeColor()" id="changeThemeImage" class="changeThemeButton">
            <img class="sun" src="./images/sun.png" alt="theme">
        </button>
    </nav>
    <form action="./login.php" method="post" style="font-family:Montserrat;">
        <div class="container">
            <h1>Войти</h1>
            <p>Введите свои данные для входа</p>
            <hr>

            <label for="username"><b>Логин</b></label>
            <input type="text" placeholder="Введите логин" name="username" id="username" required>

            <label for="password"><b>Пароль</b></label>
            <input type="password" placeholder="Введите пароль" name="password" id="password" required>

            <p>Ещё нет учётной записи? <a href="./signup.php" style="color:dodgerblue">Зарегистрироваться.</p>

            <div class="clearfix">
                <button type="submit" class="loginbtn">Войти</button>
            </div>
        </div>
    </form>
</body>

</html>