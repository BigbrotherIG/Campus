<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "campus_guide";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        echo"error in connection";
    }else {
        echo"Connected";
    }

    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_NAME', "campus_guide");
?>