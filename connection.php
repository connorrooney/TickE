<?php
    function db() {
        global $link;
        $link = mysqli_connect("localhost", "root", "password", "ticketBooking") or die ("Failed to connect to the Database");
        return $link;
    }
?>