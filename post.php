<?php
require_once("config.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$nama = $conn->real_escape_string($_POST['nama']);
$badan = $conn->real_escape_string($_POST['badan']);
$wilayah = $conn->real_escape_string($_POST['wilayah']);
$cabang = $conn->real_escape_string($_POST['cabang']);
$telp = $conn->real_escape_string($_POST['telp']);
$ket = $conn->real_escape_string($_POST['ket']);

$sql = "INSERT INTO users (nama,cabang_id,wilayah_id,badan,telp,ket) VALUES ('".$nama."', '".$cabang."', '".$wilayah."', '".$badan."', '".$telp."', '".$ket."')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(["success"=>"OK"]);
} else {
  echo json_encode(["gagal"=>"Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>