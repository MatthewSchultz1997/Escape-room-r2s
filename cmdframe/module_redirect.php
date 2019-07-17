
<!-- redirects the user based on the user/pass enteres -->
<?php
$id =$_POST['userip'];

//modules
if($id =="-u 192.168.1.101 -p password1"){
	header("Location: http://192.168.1.157/cmdframe/atm.php");
}
if($id =="-u 192.168.1.102 -p password2"){
	header("Location: http://192.168.1.157/cmdframe/Comm.php");
}
if($id =="-u 192.168.1.103 -p password3"){
	header("Location: http://192.168.1.157/cmdframe/SoilP.php");
}
if($id =="-u 192.168.1.104 -p password4"){
	header("Location: http://192.168.1.157/cmdframe/WaterC.php");
}
if($id =="-u 192.168.1.105 -p password5"){
	header("Location: http://192.168.1.157/cmdframe/Rover.php");
}
if($id =="-u 192.168.1.106 -p password6"){
	header("Location: http://192.168.1.157/cmdframe/PwrP.php");
}
if($id =="-u 192.168.1.107 -p password7"){
	header("Location: http://192.168.1.157/cmdframe/WaterP.php");
}
if($id =="-u 192.168.1.108 -p password8"){
	header("Location: http://192.168.1.157/cmdframe/Liq.php");
}
if($id =="Help"){
	header("Location: http://192.168.1.157/cmdframe/help.php");
}

?>
