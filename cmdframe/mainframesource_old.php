
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

if($atm_p ==1){$ap1 = "| Atmospheric Processing | "; $ap0 = "";} else{$ap0 = "| Atmospheric Processing | "; $ap1 = "";}
if($comm ==1){$c1   = "| Communications | "; $c0 = "";}          else{$c0   = "| Communications | "; $c1 = "" ;} 
if($soil_p ==1){$s1= "| Soil Processing | "; $s0 = "";}          else{$s0 = "| Soil Processing | "; $s1 = "";}
if($water_c ==1){$wc1= "| Water Cleanup | "; $wc0 = "";}         else{$wc0 = "| Water Cleanup | "; $wc1 = "";}
if($rover ==1){$r1 = "| Rover | "; $r0 = "";}                    else{$r0 = "| Rover | "; $r1 = "";}
if($pwr_p ==1){$p1= "| Power Production | "; $p0 = "";}          else{$p0 = "| Power Production | "; $p1 = "";}
if($Water_P ==1){$wp1= "| Water Processing  | "; $wp0 = "";}      else{$wp0 = "| Water Processing  | "; $wp1 = "";}
if($liq ==1){$l1= "| Liquefaction | "; $l0 = "";}                else{$l0 = "| Liquefaction | "; $l1 = "";}

//coloured linux~$ below
//<span id="a">Linuxcmd</span>:<span id="b">~</span><span id="c">$</span>

if($atm_p ==1 && $comm ==1 && $soil_p ==1 && $water_c ==1 && $rover ==1 && $pwr_p ==1 && $Water_P ==1 && $liq ==1){$j=1;$msg1 = "| All Modules Online |"; $msg2 = "Winner!";} 
else{$msg1 = "Modules Online: <br>------------------------------------------------------------------------------------ <!-- oqwipjefqwioefjwioqfjoiqwjfeioqwjefoi --><br> $ap1 $c1 $s1 $wc1 $r1 $p1 $wp1 $l1 <br>------------------------------------------------------------------------------------<br><br> <p>System error finding following module(s): <br>------------------------------------------------------------------------------------ <br> $ap0 $c0 $s0 $wc0 $r0 $p0 <br> $wp0 $l0 <br> <!-- somesystemlaghere --->------------------------------------------------------------------------------------</p> <!-- laglaglaglaglaglaglaglaglaglaglaglag --></p><!-- superlonglagtimethattakesupalotoftimetoread --> "; $msg2 = "Enter Help for a list of commands";}


$fp = fopen('mainframe.txt', 'w+');
fwrite($fp, '<span id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span> Entering the Marco Polo Mainframe... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ OK ]<br/><br/>

<span id="b">M</span>ars<span id="b"> A</span>tmospheric & <span id="b">R</span>egolith <span id="b">CO</span>llector/<span id="b">P</span>r<span id="b">O</span>cessor for <span id="b">L</span>ander <span id="b">O</span>perations 

 &nbsp;__&nbsp;&nbsp;__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;____ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_         
 | &nbsp;\/&nbsp; | &nbsp; __ _ &nbsp; _ __ &nbsp;&nbsp; ___ &nbsp;&nbsp; ___&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp; _&nbsp;\ &nbsp;&nbsp;&nbsp;___ &nbsp; | | &nbsp; ___  
 | |\/| |&nbsp; / _&nbsp; | |&nbsp; __|&nbsp; / __|&nbsp; / _ \&nbsp;&nbsp;&nbsp;| |_)&nbsp;| &nbsp;/ _ \&nbsp; | |&nbsp; / _ \ 
 | |&nbsp; | | | (_| | | |&nbsp; &nbsp; | (__ &nbsp;| (_) |&nbsp;&nbsp;|&nbsp; __/&nbsp; | (_) | | | | (_) |
 |_|&nbsp; |_|&nbsp; \__`_| |_|&nbsp; &nbsp; &nbsp;\___| &nbsp;\___/&nbsp;&nbsp;&nbsp;|_| &nbsp; &nbsp; &nbsp;\___/ &nbsp;|_| &nbsp;\___/ 


Powering on available modules...<!-- laglaglaglaglaglaglaglaglaglaglaglag --> 
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