<?php
    
    // Starting a session
    session_start();

    // Creating constants to store non-repeating values
    define('SITEURL', 'http://localhost/restaurant_website/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'restaurant');


    // Connecting to database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    // Selecting the database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>