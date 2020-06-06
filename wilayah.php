<?php
require_once("config.php");
$val = $_POST['val'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$cid = $conn->real_escape_string($val);

$sqlcabang = "SELECT * FROM cabang WHERE id=".$cid;
$datacabang = $conn->query($sqlcabang);
$cabang = $datacabang->fetch_assoc();

$sqlwilayah = "SELECT * FROM wilayah WHERE id=".$cabang['wilayah_id'];
$result = $conn->query($sqlwilayah);

if ($result->num_rows != null) {
	$output = '';;
	while($row = $result->fetch_assoc()) {
		$output .= '<option value="'.$row['id'].'">'.$row['nama'].'</option>';		
  }
  $output .= '<option>Pilih...</option>';
  echo $output;
} else {
	echo 'No Result Found';
}
$conn->close();
?>