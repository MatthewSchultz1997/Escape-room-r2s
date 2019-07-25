<?php

$zero ="0";
$one = "1";

///////// atmospheric processing table
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "Escape_room_db";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}

$sql = "DELETE FROM atm_p WHERE Test = 0";
$sql1 = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Feedrate, CDRA_Leak, Test) VALUES ('$zero','$zero','$zero','$zero','$one')";

$result = $conn->query($sql);
$result = $conn->query($sql1);

mysqli_commit($conn);
mysqli_close($conn);

//////// Modules table
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql  = "DELETE FROM modules WHERE atm_P = 1 OR Comm = 1 OR Water_C = 1 OR Pwr_P = 1 OR Water_P = 1";
$sql1 = "INSERT INTO Modules (atm_P, Comm, Soil_P, Water_C, Rover, Pwr_P, Water_P, Liq) VALUES ('$zero','$zero','$one','$zero','$one','$zero','$zero','$one')";
$result = $conn->query($sql);
$result = $conn->query($sql1);

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

header("Location: http://192.168.1.239/cmdframe/boot.php");
?>