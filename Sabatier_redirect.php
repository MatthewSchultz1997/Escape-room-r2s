
<!-- redirects the user based on the user/pass enteres -->
<?php
$user=$_POST['cmd'];
$one ="1";
$zero ="0";
session_start();

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

							//Pages

//To test the code//
if ($user == "Connect"){
$sql = "INSERT INTO Piping () VALUES ()";
$result = $conn->query($sql);
$conn->close();
	header("Location: http://192.168.1.157/cmdframe/atm.php");
}
//To specify feedrate//
if ($user == "-H2 12.0 -CO2 3.01 -H2O 10.0 -CH4 5.01"){
$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Feedrate, CDRA_Leak, CDRA_Online, Test) VALUES ('$zero','$zero','$one','$zero','$zero','$zero')";
$result = $conn->query($sql);
$conn->close();
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
//To balance the chemical equation
if ($user == "-X 4 -Y 1 -Z 2 -W 1"){
$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Feedrate, CDRA_Leak, CDRA_Online, Test) VALUES ('$zero','$one','$zero','$zero','$zero','$zero')";
$result = $conn->query($sql);
$conn->close();
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
//To update the temperature of the fins on the RTG
if($user == "Update"){
$Power   = $_SESSION["pwrp"];	
	if($Power ==1){
		$sql = "INSERT INTO Modules (atm_P, Comm, Soil_P, Water_C, Rover, Pwr_P, Water_P, Liq) VALUES ('$zero','$zero','$zero','$zero','$zero','$one','$zero','$zero')";
		$result = $conn->query($sql);
		$conn->close();
	}	
header("Location: http://192.168.1.157/cmdframe/PwrP.php");
}
//To update the partial pressure in the habitat atmospheric pressure unit of atmospheric processing
if($user == "Refresh"){
$O2Value = $_SESSION["O2"];
	if($O2Value ==21){
		$sql = "INSERT INTO atm_p (Partial_Pressures, Sabatier_Balance, Sabatier_Feedrate, CDRA_Leak, CDRA_Online, Test) VALUES ('$one','$zero','$zero','$zero','$zero','$zero')";
		$result = $conn->query($sql);
		
	}
header("Location: http://192.168.1.157/cmdframe/Partial_Pressure.php");
}
//The rest of these are just redirects to go from page to page.
if($user == "Marco Polo"){
	header("Location: http://192.168.1.157/cmdframe/mainframesource.php");
}
if($user == "Carbon Dioxide Recovery Assembly"){
	header("Location: http://192.168.1.157/cmdframe/CDRA.php");
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
	header("Location: http://192.168.1.157/cmdframe/atm.php");
}
if($user == "Boot"){
	header("Location: http://192.168.1.157/cmdframe/boot.php");
}
if($user == "Communications"){
	header("Location: http://192.168.1.157/cmdframe/Comm.php");
}
if($user == "Help"){
	header("Location: http://192.168.1.157/cmdframe/help.php");
}
if($user == "Liquefaction"){
	header("Location: http://192.168.1.157/cmdframe/Liq.php");
}
if($user == "Power Production"){
	header("Location: http://192.168.1.157/cmdframe/PwrP.php");
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
