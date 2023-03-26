<?php 
$servername = "localhost";
$username = "id7123753_arrana";
$password = "123456";
$dbname = "id7123753_lifecare";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 ?>