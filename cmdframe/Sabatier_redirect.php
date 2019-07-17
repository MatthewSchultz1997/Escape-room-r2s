
<!-- redirects the user based on the user/pass enteres -->
<?php
$user=$_POST['cmd'];
$one ="1";
$zero ="0";
session_start();


//Pages

if ($user == "-H2 1 -CO2 2 -H2O 3 -CH4 4"){
$servername = "localhost";
$username = "root";
$password ="";
$dbname="escape_room_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("connection failed:" . $conn->connect_error);
}
$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Connect, Sabatier_Feedrate, O2_Connect, CDRA_Connect, CDRA_Leak, Test) VALUES ('$zero','$one','$one','$one','$zero','$zero','$zero','$zero')";
$result = $conn->query($sql);

$conn->close();
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
if ($user == "-X 4 -Y 1 -Z 2 -W 1"){
$servername = "localhost";
$username = "root";
$password ="";
$dbname="escape_room_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("connection failed:" . $conn->connect_error);
}
$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Connect, Sabatier_Feedrate, O2_Connect, CDRA_Connect, CDRA_Leak, Test) VALUES ('$zero','$one','$one','$zero','$zero','$zero','$zero','$zero')";
$result = $conn->query($sql);

$conn->close();
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
if($user == "Refresh"){
$O2Value = $_SESSION["O2"];
	if($O2Value ==9){
		$servername = "localhost";
		$username = "root";
		$password ="";
		$dbname="escape_room_db";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("connection failed:" . $conn->connect_error);
		}
		$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Connect, Sabatier_Feedrate, O2_Connect, CDRA_Connect, CDRA_Leak, Test) VALUES ('$one','$zero','$zero','$zero','$zero','$zero','$zero','$zero')";
		$result = $conn->query($sql);
	}
header("Location: http://192.168.1.157/cmdframe/Partial_Pressure.php");
}

if($user == "Habitat Atmospheric Pressure"){
	header("Location: http://192.168.1.157/cmdframe/Partial_Pressure.php");
}
if($user == "Sabatier Reactor"){
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
if($user == "ASCII Decode"){
	header("Location: http://192.168.1.157/cmdframe/ASCII_Decode.php");
}
if($user == "Atmospheric Processing"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Boot"){
	header("Location: http://192.168.1.157/cmdframe/boot.php");
}
if($user == "Communications"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Help"){
	header("Location: http://192.168.1.157/cmdframe/help.php");
}
if($user == "Hint"){
	header("Location: http://192.168.1.157/cmdframe/hint.php");
}
if($user == "Liquefaction"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Map"){
	header("Location: http://192.168.1.157/cmdframe/map.php");
}
if($user == "Marco Polo"){

$atmproc = $_SESSION["atmp"];
	if($atmproc ==1){
		$servername = "192.168.1.186";
		$username = "matt";
		$password ="";
		$dbname="Escape_room_db";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("connection failed:" . $conn->connect_error);
		}
		$sql = "INSERT INTO Modules (atm_P, Comm, Soil_P, Water_C, Rover, Pwr_P, Water_P, Liq) VALUES ('$one','$zero','$zero','$zero','$zero','$zero','$zero','$zero')";
		$result = $conn->query($sql);
	}
	
header("Location: http://192.168.1.157/cmdframe/mainframesource.php");
}
if($user == "Power Production"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Science Rover"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Soil Processing"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Time"){
	header("Location: http://192.168.1.157/cmdframe/time.php");
}
if($user == "Water Cleanup"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
if($user == "Water Processing"){
	header("Location: http://192.168.1.157/cmdframe/Module_login.php");
}
?>
