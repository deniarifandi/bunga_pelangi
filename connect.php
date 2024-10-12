<?php
$servername = "localhost";
$username = "distudi1_maindb";
$password = "LCh5F4XZD";
$db = "distudi1_maindb";
//$conn = mysqli_connect("localhost", "distudi1_maindb", "LCh5F4XZD", "distudi1_maindb");
// Create connection
$conn = new mysqli($servername, $username, $password,$db);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>