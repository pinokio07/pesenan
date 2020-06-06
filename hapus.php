<?php
require_once("config.php");
$id = $_POST['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM users WHERE id = ".$id;
$result = $conn->query($sql);

$conn->close();
?>