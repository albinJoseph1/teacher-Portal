<?php
    $servername = "localhost"; 
    $username = "albin"; 
    $password = "start"; 
    $dbname = "classroom";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Error connecting to";
        die("Connection failed: " . $conn->connect_error);
    }

?>