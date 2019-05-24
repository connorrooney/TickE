<?php
    require_once('connection.php');
    session_start();
    db();
    global $link;

    $userCheck = $_SESSION['username'];
    $seshQuery = mysqli_query($link, "SELECT username FROM users WHERE username = '$userCheck'");
    $row = mysqli_fetch_array($seshQuery, MYSQLI_ASSOC);

    $loginSesh = $row['username'];

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
        die();
    }
?>