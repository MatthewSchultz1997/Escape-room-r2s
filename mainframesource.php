
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
	$Water_P = $row['Water_P'];
}
if ($i == 7){
	$liq = $row['Liq'];
}
mysqli_commit($conn);
mysqli_close($conn);
}

//check which modules are online
$array = array("Partial_Pressures", "Sabatier_Balance", "Sabatier_Feedrate", "CDRA_Leak", "CDRA_Online", "Test");
for($i=0; $i <6; $i++){
	
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
//Checking which units are online
$sql = "SELECT * FROM atm_p ORDER BY ". $array[$i] ." desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if ($i == 0){
	$pp = $row['Partial_Pressures'];	
}
if ($i == 1){
	$sb = $row['Sabatier_Balance'];	
}
if ($i == 2){
	$sf = $row['Sabatier_Feedrate'];	
}
if ($i == 3){
	$cl = $row['CDRA_Leak'];	
}
if ($i == 4){
	$CDRA_Online = $row['CDRA_Online'];
}
if ($i == 5){
	$test = $row['Test'];	
}
mysqli_commit($conn);
mysqli_close($conn);
}


//check if the piping is properly wired
$array = array("OGA_H2O_Feed", "OGA_H2O_R_Feed", "OGA_O2_Out", "OGA_H2_Out", "CDRA_CO2_Out", "Sabatier_H2O_Out", "Sabatier_CH4_Out", "Moisture_H2O_Out", "N2_Purge");
for($i=0; $i <9; $i++){
	
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
$sql = "SELECT * FROM Piping ORDER BY ". $array[$i] ." desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

if ($i == 0){
	$OGA_H2O_Feed = $row['OGA_H2O_Feed'];	
}
if ($i == 1){
	$OGA_H2O_R_Feed = $row['OGA_H2O_R_Feed'];	
}
if ($i == 2){
	$OGA_O2_Out = $row['OGA_O2_Out'];	
}
if ($i == 3){
	$OGA_H2_Out = $row['OGA_H2_Out'];	
}
if ($i == 4){
	$CDRA_CO2_Out = $row['CDRA_CO2_Out'];	
}
if ($i == 5){
	$Sabatier_H2O_Out = $row['Sabatier_H2O_Out'];	
}
if ($i == 6){
	$Sabatier_CH4_Out = $row['Sabatier_CH4_Out'];	
}
if ($i == 7){
	$Moisture_H2O_Out = $row['Moisture_H2O_Out'];	
}
if ($i == 8){
	$N2_Purge = $row['N2_Purge'];	
}
mysqli_commit($conn);
mysqli_close($conn);
}
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}
$sql = "SELECT * FROM OGA_Boot ORDER BY OGA_Online desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$OGA_Online = $row['OGA_Online'];
$sql = "SELECT * FROM OGA_Boot ORDER BY Sabatier_Online desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$Sabatier_Online = $row['Sabatier_Online'];

					//checking which units are online
//Sabatier Reactor
if($Sabatier_Online ==1){$Sabatier = "<span id='a'>&nbsp;Online</span>";} 				   else{$Sabatier = "<span id='b'>Offline</span>";}
//CDRA
if($CDRA_Online ==1){$CDRA = "<span id='a'>&nbsp;Online</span>";} 		  				   else{$CDRA = "<span id='b'>Offline</span>";}
//HAP
if($OGA_O2_Out == 1 && $pp == 1){$Partial_Pressure = "<span id='a'>&nbsp;Online</span>";}  else{$Partial_Pressure = "<span id='b'>Offline</span>";}
//RTG
if($pwr_p == 1){$RTG = "<span id='a'>&nbsp;Online</span>";}  							   else{$RTG = "<span id='b'>Offline</span>";}
//OGA
if($OGA_Online == 1){$OGA = "<span id='a'>&nbsp;Online</span>";}  						   else{$OGA = "<span id='b'>Offline</span>";}

//checking which modules are online
if($CDRA_Online ==1 && $Sabatier_Online ==1 && $OGA_O2_Out == 1 && $pp == 1){$ap1 = "<span id='a'>&nbsp;Online</span>";}      else{$ap1 = "<span id='b'>Offline</span>";}
if($comm ==1){$c1   = "<span id='a'>Online</span>";}           			 else{$c1   = "<span id='b'>Offline</span>";} 
if($soil_p ==1){$s1= "<span id='a'>Online</span>";}           			 else{$s1 = "<span id='b'>Offline</span>";}
if($water_c ==1){$wc1= "<span id='a'>&nbsp;Online</span>";}    			 else{$wc1 = "<span id='b'>Offline</span>";}
if($rover ==1){$r1 = "<span id='a'>Online</span>";}            			 else{$r1 = "<span id='b'>Offline</span>";}
if($pwr_p ==1){$p1= "&nbsp;<span id='a'>Online</span>";}            		     else{$p1 = "<span id='b'>Offline</span>";}
if($OGA_Online ==1){$wp1= "<span id='a'>&nbsp;Online</span>";}           else{$wp1 = "<span id='b'>Offline</span>";}
if($liq ==1){$l1= "<span id='a'>Online</span>";}              			 else{$l1 = "<span id='b'>Offline</span>";}

$msg2 = "Enter Help for a list of commands";
$msg1 = "Science Rover Module &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $r1 
<br>-------------------------------------------------------------------------------------<br>
Liquefaction Module&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $l1
<br>-------------------------------------------------------------------------------------<br>
Soil Processing Module &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $s1
<br>-------------------------------------------------------------------------------------<br>
Atmospheric Processing Module &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ap1
<br>&nbsp;&nbsp;&nbsp;Units: <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sabatier Reactor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $Sabatier <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Carbon Dioxide Recovery Assembly &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $CDRA <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Habitat Atmospheric Pressure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $Partial_Pressure
<br>-------------------------------------------------------------------------------------<br>
Communications Module &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $c1
<br>-------------------------------------------------------------------------------------<br>
Power Production Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $p1
<br>&nbsp;&nbsp;&nbsp;Units: <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RTG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $RTG
<br>-------------------------------------------------------------------------------------<br>
Water Processing Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $wp1
<br>&nbsp;&nbsp;&nbsp;Units: <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oxygen Generation Assembly &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $OGA
<br>-------------------------------------------------------------------------------------<br>
Water Cleanup Module&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $wc1
<br>&nbsp;&nbsp;&nbsp;Units: <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Water Recovery Assembly &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $wc1
<br>-------------------------------------------------------------------------------------<br>

";

$fp = fopen('mainframe.txt', 'w+');
fwrite($fp, '<span id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span> Entering the Marco Polo Mainframe... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ OK ]<br/><br/>

<span id="b">M</span>ars<span id="b"> A</span>tmospheric & <span id="b">R</span>egolith <span id="b">CO</span>llector/<span id="b">P</span>r<span id="b">O</span>cessor for <span id="b">L</span>ander <span id="b">O</span>perations 

 &nbsp;__&nbsp;&nbsp;__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_         
 | &nbsp;\/&nbsp; | &nbsp; __ _ &nbsp; _ __ &nbsp;&nbsp; ___ &nbsp;&nbsp; ___&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp; _&nbsp;\ &nbsp;&nbsp;&nbsp;___ &nbsp; | | &nbsp; ___  
 | |\/| |&nbsp; / _&nbsp; | |&nbsp; __|&nbsp; / __|&nbsp; / _ \&nbsp;&nbsp;&nbsp;| |_)&nbsp;| &nbsp;/ _ \&nbsp; | |&nbsp; / _ \ 
 | |&nbsp; | | | (_| | | |&nbsp; &nbsp; | (__ &nbsp;| (_) |&nbsp;&nbsp;|&nbsp; __/&nbsp; | (_) | | | | (_) |
 |_|&nbsp; |_|&nbsp; \__`_| |_|&nbsp; &nbsp; &nbsp;\___| &nbsp;\___/&nbsp;&nbsp;&nbsp;|_| &nbsp; &nbsp; &nbsp;\___/ &nbsp;|_| &nbsp;\___/ 


Checking modules status...<!-- laglaglaglaglaglaglaglaglaglaglaglag --> 
<p>' . $msg1 . '</p>
<!--laglaglaglaglaglaglaglaglaglaglaglag -->
<p> ' . $msg2 . ' </p> ');
fclose($fp);
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

Typer.speed=25;
Typer.file="mainframe.txt";
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
if( form.cmd.value == "ASCII Decode"
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

<form name="cmdentry" action="redirect.php" method="post" >
	<span  class="f"id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span>
	<input class="i" type="text" autocomplete="off" name="cmd" >
	<button class="submitbutton" name="submit" type="submit" onclick="return check(this.form)" value="Enter"></button>
</form>



</body> 
</html> 