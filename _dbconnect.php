<?php

$showAlert = false; 
$server = "localhost";
$username = "root";
$password = "";
$database = "expense";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>