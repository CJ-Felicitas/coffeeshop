<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "coffeeshop";

$conn = new mysqli($servername, $username, $password, $database);

// terminate connection if error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
