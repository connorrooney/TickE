<?php
    include('session.php');
    require_once('connection.php');
    db();
    global $link;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Purchased!</title>
</head>
<body>
    <div class="navBar">
        <a href="index.php"><img src="img/logo.svg" class="logo"></a>

        <a href="PHP HERE" class="navItem"><h2>Concerts</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Events</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Festivals</h2></a>
        <a href="profile.php" class="navItem"><h2>Profile</h2></a>

        <span class="searchBar"><i class="fas fa-search"></i> Search Events</span>

        <a href="login.php"><button class="loginButton">login</button></a>
    </div>
    <div class="box">
        <a href='profile.php'>Profile</a>
    </div>
</body>
</html>