
<!-- redirects the user based on the user/pass enteres -->
<?php
$user=$_POST['cmd'];

//Pages
if($user == "Carbon Dioxide Recovery Assembly"){
	header("Location: http://192.168.1.157/cmdframe/CDRA.php");
}
if($user == "Sabatier Reactor"){
	header("Location: http://192.168.1.157/cmdframe/Sabatier_Reactor.php");
}
if($user == "Habitat Atmospheric Pressure"){
	header("Location: http://192.168.1.157/cmdframe/Partial_Pressure.php");
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