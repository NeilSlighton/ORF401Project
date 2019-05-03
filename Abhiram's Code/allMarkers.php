<?php
ini_set('display_errors', 1);

$connection=mysqli_connect ('localhost', "dbasta_dbasta", "Sillypassword", "dbasta_handyRoads");

if (!$connection) {
  die ('Can\'t use db : ' . mysqli_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM tbl_images WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header('Content-Type: application/json');

$rows = array();

while($row = mysqli_fetch_array($result)) {
	$data = base64_encode($row["name"]);
    $rows[] = array("name" => $data, "Longitude" => $row["Longitude"], "Latitude" => $row["Latitude"]);
}

echo json_encode($rows);

mysqli_close($connection);
?>