<?php
//this file is the database handler
//so we dont have to keep typing the things below
//on each and every file

$servername = "localhost";
$username = "root";
$password = "";
$db = "PATS";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $conn->close();
?>