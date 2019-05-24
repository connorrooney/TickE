<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="navBar">
        <img src="img/logo.svg" class="logo">

        <a href="PHP HERE" class="navItem"><h2>Concerts</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Events</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Festivals</h2></a>

        <span class="searchBar"><i class="fas fa-search"></i> Search Events</span>

        <button class="loginButton">log out</button>
    </div>
    <div class="profileCont">
        <div class="myTickets">
            <h1>My Tickets<hr></h1>

            <div class="ticket">
                <img src="img/eventsNear/easylife.jpg">
                <div class="ticketInfo">
                    <h2>Easy Life</h2>
                    <span>Xxxxxxxxxxxx, Xxxxxxxxxxxx</span>
                </div>
                <div class="ticketLink">
                    <a href="" ><button class="moreInfo">View</button></a>
                </div>
            </div>

        </div>
        <div class="addCredit">
            <center>
            <h1>Welcome <?php echo $loginSesh;?>
            <h1>Credit Overview</h1>
            <h1><i class="far fa-credit-card"></i> £78.40</h1>

            <form action="" method="POST">
                <label>Credit Ammount:</label><br>
                <input type="number" name="creditAmmount">
                <br>
                <br>
                <input class="moreInfo" type="submit" name="creditSubmit">
            </form>
            </center>
        </div>
    </div>
</body>
</html>