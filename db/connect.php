<?php
    $dbHostName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "domskykomis";

    $mysqli = new mysqli($dbHostName, $dbUsername, $dbPassword, $dbName);
    if($mysqli->connect_error){
        printf("Connection Failed: %s\n", $mysqli->connect_error);
        exit();
    }
?>