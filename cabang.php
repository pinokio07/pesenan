<?php
require_once("config.php");

$val = $_POST['val'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cabang WHERE wilayah_id = ".$val;

$result = $conn->query($sql);

if ($result->num_rows != null) {
	$output = '<option>Pilih...</option>';;
	while($row = $result->fetch_assoc()) {
		$output .= '<option value="'.$row['id'].'">'.$row['nama'].'</option>';		
  }
  echo $output;
} else {
	echo 'No Result Found';
}
$conn->close();
?>