<?php
    include('session.php');
    require_once('connection.php');
    db();
    global $link;

    if($_POST['creditSubmit']) {
        $cResult = mysqli_query($link, "SELECT * FROM users WHERE username = '$loginSesh'");
        $cRow = mysqli_fetch_array($cResult);
        $currentCredit = $cRow['credit'];
        $input = $_POST['creditAmmount'];
        $newCredit = $currentCredit + $input;
        mysqli_query($link, "UPDATE users SET credit = '$newCredit' WHERE username = '$loginSesh'");
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
    <link rel="stylesheet" href="css/profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="navBar">
        <a href="index.php"><img src="img/logo.svg" class="logo"></a>

        <a href="PHP HERE" class="navItem"><h2>Concerts</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Events</h2></a>
        <a href="PHP HERE" class="navItem"><h2>Festivals</h2></a>
        <a href="profile.php" class="navItem"><h2>Profile</h2></a>

        <span class="searchBar"><i class="fas fa-search"></i> Search Events</span>

        <a href="logout.php"><button class="loginButton">log out</button></a>
    </div>
    <div class="profileCont">
        <div class="myTickets">
            <h1>My Tickets<hr></h1>
            <?php
                $query = "SELECT * FROM users WHERE username = '$loginSesh'";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $credit = $row['credit'];
                    $tickets = json_decode($row['tickets']);
                    for($i = 0; $i < count($tickets); $i++ ) {
                        $tQuery = "SELECT * FROM events WHERE id = '$tickets[$i]'";
                        $tResult = mysqli_query($link, $tQuery);
                        if(mysqli_num_rows($tResult) == 1) {
                            while($tRow = mysqli_fetch_array($tResult)) {
                                $id = $tRow['id'];
                                $name = $tRow['name'];
                                $location = $tRow['location'];
                                $address = $tRow['address'];
                                $day = $tRow['day'];
                                $month = $tRow['month'];
                                $time = $tRow['time'];
                                $img = $tRow['img'];
                                ?>
            <div class="ticket">
                <img src="<?php echo $img;?>">
                <div class="ticketInfo">
                    <h2><?php echo $name;?></h2>
                    <span><?php echo $address . ", " . $location;?></span><br>
                    <span><?php echo $day . " " . $month . " @ " . $time;?>
                </div>
                <div class="ticketLink">
                    <a href="detail.php?id=<?php echo $id?>"><button class="moreInfo">View</button></a>
                </div>
            </div>
            <?php
                            }
                        }
                    }
                }
            ?>
        </div>
        <div class="addCredit">
            <center>
            <h1>Welcome <?php echo $loginSesh;?></h1>
            <h1>Credit Overview</h1>
            <h1><i class="far fa-credit-card"></i> £<?php echo $credit;?> </h1>
            <form action="profile.php" method="POST">
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