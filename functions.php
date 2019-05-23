<?php
    function inject_checker ($connection , $field) {
        return (htmlentities(trim(mysqli_real_escape_string($connection, $field))));
    }
?>