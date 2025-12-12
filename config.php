<?php
// Database configuration
$host = "localhost"; // or "127.0.0.1"
$username = "root";
$password = ""; // Default XAMPP password is empty
$database = "techsera";
$port = 3306; // Default MySQL port

// Create connection
$con = mysqli_connect($host, $username, $password, $database, $port);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error() . "<br>Please make sure MySQL is running in XAMPP Control Panel.");
}