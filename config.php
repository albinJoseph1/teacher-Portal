<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'albin');
define('DB_PASSWORD', 'start');
define('DB_NAME', 'classroom');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        echo "Error connecting to the database";
        die("Connection failed: " . $conn->connect_error);
    }   
?>