<?php
//connect to database
$servername = "localhost";$sqlusername = "bereanj1";$password = "bsynx3";$dbname = "bereanj1_db";
// Create connection
$conn = new mysqli($servername, $sqlusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$conn->close();
?>