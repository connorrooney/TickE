<?php
    require_once('connection.php');
    session_start();
    db();
    global $link;

    if($_POST['loginButton']) {
        $username = mysqli_real_escape_string($link, $_POST['loginUsername']);
        $passowrd = mysqli_real_escape_string($link, $_POST['loginPassword']);

        $query = "SELECT id FROM users WHERE username = '$username' AND password = '$passowrd'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("Location: profile.php");
        } else {
            $error_msg = "Username or Password is invalid";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Tick-e Login</title>
</head>
<body>
    <div class="navBar">
        <a href="index.php"><img src="img/logo.svg" class="logo"></a>

        <a href="PHP HERE" class="navItem"><h2>Concerts</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Events</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Festivals</h2></a>
        <a href="profile.php" class="navItem"><h2>Profile</h2></a>

        <span class="searchBar"><i class="fas fa-search"></i> Search Events</span>

        <button class="loginButton">login</button>
    </div>

    <div class="loginCont">
        <div class="loginForm">
            <img src="img/logosquare.svg">
            <form method="POST" action="login.php">
                <label>Username:</label><br>
                <input type="text" placeholder="Username" name="loginUsername" required><br>

                <label>Password:</label><br>
                <input type="password" placeholder="Password" name="loginPassword" required><br><br>

                <center><input class="loginButtonSubmit" type="submit" name="loginButton" value="login"></center>
            </form>
        </div>
    </div>
</body>
</html>