<?php
require_once("config.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$telp = $conn->real_escape_string($_POST['val']);

$sql = "SELECT * FROM users WHERE telp = ".$telp;
$result = $conn->query($sql);

if ($result != null) {
  echo json_encode(["success"=>"FALSE"]);
} else {
  echo json_encode(["success"=>"OK"]);
}

$conn->close();
?>