<?php
    $mysqli = new mysqli("localhost", "root", "", "cms");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        die();
    } 
    ?>