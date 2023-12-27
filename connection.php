<?php
    if (!file_exists('config.php')){
        die('Error: config.php file not found. Please create the config.php file.');
    }
    else{
        include("config.php");
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }
?>
