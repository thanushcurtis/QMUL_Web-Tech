<?php
    $dbhost='localhost';
    $dbuser ='root';
    $dbpassword ='root';
    $dbdatabase= 'miniproject';

    $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

    // Check connection
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
    }

?>