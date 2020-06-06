<?php
session_start();
require_once("config.php");
$no = 1;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result != null) {
	$data = [];
	while($row = $result->fetch_assoc()) {
		$sqlwilayah = "SELECT * FROM wilayah WHERE id=".$row['wilayah_id'];
		$sqlcabang = "SELECT * FROM cabang WHERE id=".$row['cabang_id'];		
		$cabang =  $conn->query($sqlcabang);
		$wilayah = $conn->query($sqlwilayah);
		$namacabang = $cabang->fetch_assoc();
		$namawilayah = $wilayah->fetch_assoc();
		
		$data[] = [
			'no' => $no++,
			'nama' => $row['nama'] ?? '',
			'badan' => $row['badan'] ?? '',
			'cabang' => $namacabang['nama'] ?? '',
			'wilayah' => $namawilayah['nama'] ?? '',
			'telp' => $row['telp'] ?? '',
			'hapus' => '<button data-id="'.$row['id'].'" class="btn btn-danger btn-sm hapus">Hapus</button>',
		];
  }
} else {
	$data = [''];
}

echo json_encode(['data'=>$data]);

$conn->close();