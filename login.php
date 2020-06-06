<?php
session_start();
$phone = $_POST['phone'];
require_once("config.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE telp = ".$phone;
$result = $conn->query($sql);

if ($result->num_rows != null) {
	echo json_encode(["success"=>"OK", "redir"=>$redirect]);
} else {
	echo json_encode(["success"=>"FALSE"]);
}

$conn->close();