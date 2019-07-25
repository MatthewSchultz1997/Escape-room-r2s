<?php
///////// atmospheric processing table
$servername = "192.168.1.186";
$username   = "matt";
$password   = "";
$dbname     = "Escape_room_db";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}

$sql = "DELETE FROM atm_p WHERE Test = 0";
$result = $conn->query($sql);

mysqli_commit($conn);
mysqli_close($conn);

//////// Modules table
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM Modules WHERE atm_P = 1 OR Comm = 1 OR Water_C = 1 OR Pwr_P = 1 OR Water_P = 1";
$result = $conn->query($sql);

mysqli_commit($conn);
mysqli_close($conn);

//////// Habitat pressure table
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM pressure_test WHERE counter !=0";
$result = $conn->query($sql);

mysqli_commit($conn);
mysqli_close($conn);

//////// power production table
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "DELETE FROM pwrp WHERE id != 1";
$result = $conn->query($sql);

mysqli_commit($conn);
mysqli_close($conn);

header("Location: http://192.168.1.157/cmdframe/boot.php");
?>