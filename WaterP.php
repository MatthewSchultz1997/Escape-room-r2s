
<!--
Copyright (c) 2011 Sam Phippen <samphippen@googlemail.com>
 
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
 
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
 
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
--> 

<?php

$servername = "192.168.1.186";
$username   = "matt";
$password   = "";
$dbname     = "Escape_room_db";


//check which modules are online
$array = array("atm_P", "Comm", "Soil_P", "Water_C", "Rover", "Pwr_P", "Water_P", "Liq");
for($i=0; $i <8; $i++){
	
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
//to make sure the sabatier and water recovery modules are online for boot up.
$sql = "SELECT * FROM Modules ORDER BY ". $array[$i] ." desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if ($i == 0){
	$atm_p = $row['atm_P'];
}
if ($i == 1){
	$comm = $row['Comm'];
}
if ($i == 2){
	$soil_p = $row['Soil_P'];
}
if ($i == 3){
	$water_c = $row['Water_C'];
}
if ($i == 4){
	$rover = $row['Rover'];
}
if ($i == 5){
	$pwr_p = $row['Pwr_P'];
}
if ($i == 6){
	$water_p = $row['Water_P'];
}
if ($i == 7){
	$liq = $row['Liq'];
}
mysqli_commit($conn);
mysqli_close($conn);
}

//check piping
$array = array("OGA_H2_Out", "CDRA_CO2_Out", "Sabatier_H2O_Out", "Sabatier_CH4_Out", "OGA_H2O_Feed", "OGA_H2O_R_Feed", "OGA_O2_Out", "OGA_H2_Out");
for($i=0; $i <8; $i++){
	
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}

$sql = "SELECT * FROM Piping ORDER BY " . $array[$i] . " desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if ($i == 0){
	$OGA_H2_Out = $row['OGA_H2_Out'];	
}
if ($i == 1){
	$CDRA_CO2_Out = $row['CDRA_CO2_Out'];	
}
if ($i == 2){
	$Sabatier_H2O_Out = $row['Sabatier_H2O_Out'];	
}
if ($i == 3){
	$Sabatier_CH4_Out = $row['Sabatier_CH4_Out'];	
}
if ($i == 4){
	$OGA_H2O_Feed = $row['OGA_H2O_Feed'];
}
if ($i == 5){
	$OGA_H2O_R_Feed = $row['OGA_H2O_R_Feed'];
}
if ($i == 6){
	$OGA_O2_Out = $row['OGA_O2_Out'];
}
if ($i == 7){
	$OGA_H2_Out = $row['OGA_H2_Out'];
}
if($OGA_H2_Out ==1 && $Sabatier_CH4_Out ==1 && $Sabatier_H2O_Out ==1 && $CDRA_CO2_Out ==1){$Sabatier =1;} else{$Sabatier =0;}

mysqli_commit($conn);
mysqli_close($conn);
}

//Check if OGA is online
$conn = new mysqli($servername, $username, $password, $dbname);

	//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
$sql = "SELECT * FROM OGA_Boot ORDER BY OGA_Online desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$OGA_booted = $row['OGA_Online'];

mysqli_commit($conn);
mysqli_close($conn);



//Piping section
$piping = 0;
$msg2 = $msg3 = "";
//No pping set up
if($OGA_H2O_Feed ==0 && $OGA_H2O_R_Feed ==0 && $OGA_H2_Out ==0 && $OGA_O2_Out ==0){$msg1 ="Error: No piping detected";}
//feed is set up
if($OGA_H2O_Feed ==1 && $OGA_H2O_R_Feed ==1){
	if($OGA_H2_Out ==0 && $OGA_O2_Out ==0){$msg1 = "Error: Feed set up. No output pipes detected";}
	if($OGA_H2_Out ==1 && $OGA_O2_Out ==0){$msg1 = "Error: Feed set up. No O2 output pipe detected";}
	if($OGA_H2_Out ==0 && $OGA_O2_Out ==1){$msg1 = "Error: Feed set up. No H2 output pipe detected";}
	if($OGA_H2_Out ==1 && $OGA_O2_Out ==1){$piping = 1;$msg1 = "Piping Properly configured <br>";}
}
//if feed is half set up
if($OGA_H2O_Feed ==1 xor $OGA_H2O_R_Feed ==1){
	if($OGA_H2O_Feed ==1 && ($OGA_H2_Out ==1 && $OGA_O2_Out ==0)){$msg1 = "Error: H2O feed from recovery module and O2 output pipes not detected";}
	if($OGA_H2O_Feed ==1 && ($OGA_H2_Out ==0 && $OGA_O2_Out ==1)){$msg1 = "Error: H2O feed from recovery module and H2 output pipes not detected";}
	if($OGA_H2O_Feed ==1 && ($OGA_H2_Out ==1 && $OGA_O2_Out ==1)){$msg1 = "Error: Output set up. No H2O feed from recovery module detected";}
	if($OGA_H2O_R_Feed   ==1 && ($OGA_H2_Out ==1 && $OGA_O2_Out ==0)){$msg1 = "Error: H2O feed from shuttle fuel cell and O2 output pipes not detected";}
	if($OGA_H2O_R_Feed   ==1 && ($OGA_H2_Out ==0 && $OGA_O2_Out ==1)){$msg1 = "Error: H2O feed from shuttle fuel cell and H2 output pipes not detected";}
	if($OGA_H2O_R_Feed   ==1 && ($OGA_H2_Out ==1 && $OGA_O2_Out ==1)){$msg1 = "Error: Output set up. No H2O feed from shuttle fuel cell detected";}
}
//feed is not set up
if($OGA_H2O_Feed ==0 && $OGA_H2O_R_Feed ==0){
	if($OGA_H2_Out ==1 && $OGA_O2_Out ==1){$msg1 = "Error: Output set up. No feed piping  detected";}
	if($OGA_H2_Out ==0 && $OGA_O2_Out ==1){$msg1 = "Error: Only O2 output piping detected";}
	if($OGA_H2_Out ==1 && $OGA_O2_Out ==0){$msg1 = "Error: Only H2 output piping detected";}
}
$msg = "Enter Help for a list of commands";
//Message saying ready for boot
if($piping ==1){ 
	if($Sabatier ==1){$msg2 = "Ready for boot...";}
	else{$msg2 = "Waiting for Sabatier Reactor to come online...";}
}

if($OGA_booted ==1){ $msg2 = "Oxygen Generation Assembly Online";}

//Next section will be the boot- will have to be mainly on the raspberry pi since I cant continously monitor the database from here... 
//Place a while true loop inside and if statement, have it break once properly booted?
//Will update this section when I have the physical units infront of me

$fp = fopen('Water_P.txt', 'w+');
fwrite($fp, '<span id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span> Entering the Water Processing module... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp [ Ok ] <br/><br/>
__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_                 
\ \&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ /&nbsp;&nbsp;&nbsp;__ _&nbsp;&nbsp;| |_&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;_ __ 
&nbsp;\ \ /\ / /&nbsp;&nbsp;&nbsp;/ _` | | __|&nbsp;&nbsp;/ _ \ | `__|
&nbsp;&nbsp;\ V&nbsp;&nbsp;V /&nbsp;&nbsp;&nbsp;| (_| | | |_&nbsp;&nbsp;|&nbsp;&nbsp;__/ | |   
&nbsp;&nbsp;&nbsp;\_/\_/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\__,_|&nbsp;&nbsp;\__|&nbsp;&nbsp;\___|&nbsp;|_|
&nbsp;____&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_                 
|&nbsp;&nbsp;_ \&nbsp;&nbsp;&nbsp;_ __&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;(_)&nbsp;&nbsp;_ __&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__ _ 
| |_) | | `__|&nbsp;&nbsp;/ _ \&nbsp;&nbsp;&nbsp;/ __|&nbsp;&nbsp;/ _ \ / __| / __| | | | `_ \&nbsp;&nbsp;&nbsp;/ _` |
|&nbsp;&nbsp;__/&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp;&nbsp;| (_) | | (__&nbsp;&nbsp;|&nbsp;&nbsp;__/ \__ \ \__ \ | | | | | | | (_| |
|_|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|_|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\___/&nbsp;&nbsp;&nbsp;\___|&nbsp;&nbsp;\___| |___/ |___/ |_| |_| |_|&nbsp;&nbsp;\__, |
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|___/ 

_________________________________________________________________________________

<p>Loading Water Processing units..... <br>--------------------------------------------------------------------------------- <!-- oqwipjefqwioefjwioqfjoiqwjfeioqwjefoi --><br> ' . $msg1 . ' ' . $msg2 . ' ' . $msg3 . ' <br>---------------------------------------------------------------------------------</p> 
<!--laglaglaglaglaglaglaglaglaglaglaglag -->
<p> ' . $msg . ' </p> ');

fclose($fp);

if($boot_ready ==1){
	$zero = "0";
	$one = "1";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("connection failed:" . $conn->connect_error);
	}
	$sql = "INSERT INTO Modules (atm_P, Comm, Soil_P, Water_C, Rover, Pwr_P, Water_P, Liq) VALUES ('$zero','$zero','$zero','$zero','$zero','$zero','$one','$zero')";
	$result = $conn->query($sql);
	
	mysqli_commit($conn);
	mysqli_close($conn);
}


?>



<html> 
<head> 
<title>Marco Polo </title> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<style type="text/css"> 
	body {
		background-color: #000
	}
	#console {
		font-family: courier, monospace;
		color: #fff;
		width:750px;
		margin-left:auto;
		margin-right:auto;
		margin-top:100px;
		font-size:14px;
	}
	a {
		color: #0bc;
		text-decoration: none;
	}
	#a {
		color: #0f0;
	}
	#c {
		color: #0bc;
	}
	#b {
		color: #ff0096;
	}
	.submitbutton {
	background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;		
	}
	.f {
	font-family: courier, monospace;
	margin-left:300px; 
	font-size:14px;
	}
	.i {
	background: #000; 
	border: none; 
	color: #fff; 
	font-size:14px;
	font-family: courier, monospace;
	}	
</style> 
</head> 



<body> 


<script type="text/javascript"> 
	var Typer={
	text: null,
	accessCountimer:null,
	index:0, // current cursor position
	speed:1, // speed of the Typer
	file:"", //file, must be setted
	accessCount:0, //times alt is pressed for Access Granted
	deniedCount:0, //times caps is pressed for Access Denied
	init: function(){// inizialize Hacker Typer
		accessCountimer=setInterval(function(){Typer.updLstChr();},500); // inizialize timer for blinking cursor
		$.get(Typer.file,function(data){// get the text file
			Typer.text=data;// save the textfile in Typer.text
			Typer.text = Typer.text.slice(0, Typer.text.length-1);
		});
	},
 
	content:function(){
		return $("#console").html();// get console content
	},
 
	write:function(str){// append to console content
		$("#console").append(str);
		return false;
	},

	addText:function(key){//Main function to add the code
		if(key.keyCode==18){// key 18 = alt key
			Typer.accessCount++; //increase counter 
			if(Typer.accessCount>=3){// if it's presed 3 times
				Typer.makeAccess(); // make access popup
			}
		}else if(key.keyCode==20){// key 20 = caps lock
			Typer.deniedCount++; // increase counter
			if(Typer.deniedCount>=3){ // if it's pressed 3 times
				Typer.makeDenied(); // make denied popup
			}
		}else if(key.keyCode==27){ // key 27 = esc key
			Typer.hidepop(); // hide all popups
		}else if(Typer.text){ // otherway if text is loaded
			var cont=Typer.content(); // get the console content
			if(cont.substring(cont.length-1,cont.length)=="|") // if the last char is the blinking cursor
				$("#console").html($("#console").html().substring(0,cont.length-1)); // remove it before adding the text
			if(key.keyCode!=8){ // if key is not backspace
				Typer.index+=Typer.speed;	// add to the index the speed
			}else{
				if(Typer.index>0) // else if index is not less than 0 
					Typer.index-=Typer.speed;//	remove speed for deleting text
			}
			var text=Typer.text.substring(0,Typer.index)// parse the text for stripping html enities
			var rtn= new RegExp("\n", "g"); // newline regex
	
			$("#console").html(text.replace(rtn,"<br/>"));// replace newline chars with br, tabs with 4 space and blanks with an html blank
			window.scrollBy(0,50); // scroll to make sure bottom is always visible
		}
		if ( key.preventDefault && key.keyCode != 122 ) { // prevent F11(fullscreen) from being blocked
			key.preventDefault()
		};  
		if(key.keyCode != 122){ // otherway prevent keys default behavior
			key.returnValue = false;
		}
	},
 
}
 
function replaceUrls(text) {
	var http = text.indexOf("http://");
	var space = text.indexOf(".me ", http);
	if (space != -1) { 
		var url = text.slice(http, space-1);
		return text.replace(url, "<a href=\""  + url + "\">" + url + "</a>");
	} else {
	return text
}
}

Typer.speed=25;
Typer.file="Water_P.txt";
Typer.init();

var timer = setInterval("t();", 30);
function t() {
	Typer.addText({"keyCode": 123748});
	if (Typer.index > Typer.text.length) {
		clearInterval(timer);
	}
}
 
</script> 

<div id="console"></div> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-610661-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<script language="javascript">
function check(form)
{
if(form.cmd.value == "ASCII Decode"
 || form.cmd.value == "Atmospheric Processing"
 || form.cmd.value == "Boot"
 || form.cmd.value == "Communications"
 || form.cmd.value == "Help"
 || form.cmd.value == "Liquefaction"
 || form.cmd.value == "Marco Polo"
 || form.cmd.value == "Power Production"
 || form.cmd.value == "Science Rover"
 || form.cmd.value == "Soil Processing"
 || form.cmd.value == "Time"
 || form.cmd.value == "Water Cleanup"
 || form.cmd.value == "Water Processing"
)
{
	return true;
}
else
{
	alert("Unknown command")
	return false;
}
}
</script>
 
<form name="Sabatier_entry" action="Sabatier_redirect.php" method="post" >
	<span  class="f"id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span>
	<input class="i" type="text" autocomplete="off" name="cmd" >
	<button class="submitbutton" name="submit" type="submit" onclick="return check(this.form)" value="Enter"></button>
</form>


</body> 
</html> 