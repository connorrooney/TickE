<?php
    // include("session.php");
    require_once("connection.php");
    require_once("extFuncs.php");
    db();
    global $link;

    if(isset($_GET['id'])) {
        $eventId = $_GET['id'];

        $tQuery =  "SELECT * FROM users WHERE username = '$loginSesh'";
        $tResult = mysqli_query($link, $tQuery);
        if(mysqli_num_rows($tResult) == 1) {
            if($_POST['buySubmit']) {
                $bQuery = "SELECT * FROM events WHERE id = '$eventId'";
                $bResult = mysqli_query($link, $bQuery);
                if(mysqli_num_rows($bResult) == 1){
                    $bRow = mysqli_fetch_array($bResult);
                    $tPrice = $bRow['price'];
                    $tQty = $bRow['quant'];

                    $newQty = $tQty - 1;
                    if(mysqli_query($link, "UPDATE events SET quant = '$newQty' WHERE id = '$eventId'")) {
                        $tRow = mysqli_fetch_array($tResult);
                        $userCredit = $tRow['credit'];
                        $newCredit = $userCredit - $tPrice;
                        if(mysqli_query($link, "UPDATE users SET credit = '$newCredit' WHERE username = '$loginSesh'")) {
                           $array = json_decode($tRow['tickets']);
                           array_push($array, $eventId);
                           $json = json_encode($array);
                           mysqli_query($link, "UPDATE users SET tickets = '$json' WHERE username = '$loginSesh'");
                        }
                    } 
                }
            }
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
    <link rel="stylesheet" href="css/detail.css">
    <title>Tick-e</title>
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

    <div class="detailsCont">
        <?php
            require_once "connection.php";
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                db();
                global $link;
                $query = "SELECT * FROM events WHERE id = '$id'";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    if($row) {
                        $name = $row['name'];
                        $desc = $row['eventDesc'];
                        $location = $row['location'];
                        $address = $row['address'];
                        $day = $row['day'];
                        $month = $row['month'];
                        $time = $row['time'];
                        $img = $row['banner'];
                        $price = $row['price'];
                        $lineup = $row['lineup'];
        ?>
        <div class="detailsHeader">
            <img src="<?php echo $img;?>">
            <div class="detailsHeaderText">
                <h1><?php echo $name;?></h1>
            </div>
        </div>
    </div>
    <div class="mainInfoCont">
        <div class="mainInfo">
            <div class="mainInfoHeader">
                <span class="infoTitle"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;<span><?php echo $address;?>, <?php echo $location;?></span></span><br>
                <span class="infoTitle"><i class="far fa-clock"></i>&nbsp;&nbsp;<span><?php echo $day . " " . $month ?> @ <?php echo $time;?></span></span>
            </div>
            <h2>Line Up<hr></h2>
            <span class="lineup"><?php echo $lineup?></span>

            <br>

            <h2>About<hr></h2>
            <span class="aboutEvent"><?php echo $desc?></span>
        </div>
        <div class="buyTicket">
            <form method="POST" >
                <label>Name:</label><br>
                <input type="text" name="name">
                
                <br>
                <label>Username:</label><br>
                <input type="text" name="usernameCheck"><br>
                <h1>Total: <span name="totalCost">£<?php echo $price?></span></h1>
                <center><input type="submit" name="buySubmit"></center>
            </form>
        </div>
        <?php
                    }
                }
            }
        ?>
    </div>
</body>
</html>