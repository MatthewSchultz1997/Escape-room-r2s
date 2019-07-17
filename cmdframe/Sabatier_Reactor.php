
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

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "escape_room_db";


//check which modules are online
$array = array("Partial_Pressures", "Sabatier_Balance", "Sabatier_Connect", "Sabatier_Feedrate", "O2_Connect", "CDRA_Connect", "CDRA_Leak", "Test");
for($i=0; $i <8; $i++){
	
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}

$sql = "SELECT * FROM atm_p ORDER BY ". $array[$i] ." desc";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if ($i == 1){
	$sb = $row['Sabatier_Balance'];	
}
if ($i == 2){
	$sc = $row['Sabatier_Connect'];	
}
if ($i == 3){
	$sf = $row['Sabatier_Feedrate'];	
}

mysqli_commit($conn);
mysqli_close($conn);
}

if($sb ==1 && $sc ==1 && $sf ==1){$j=4;$sr1 = "| Sabatier Reactor Online |";} 
if($sc ==1 && $sb ==1 && $sf ==0){$j=3;$sr1 = "Error: Feedrate not set"; $srb = "Feed Connected <br> Reaction balanced <br>";}
if($sc ==1 && $sb ==0 && $sf ==0){$j=2;$sr1 = "Error: Feedrate not set<br>"; $srb = "Feed Connected <br> Error: Sabatier Reaction Unbalanced <br> Balance the following reaction: <br> X H2 + Y CO2 --> Z H2O + W CH4 <br>";}
if($sc ==0 && $sb ==0 && $sf ==0){$j=1;$sr1 = "Error: Feedrate not set"; $srb ="Error: No Feed Connected <br> Error: Sabatier Reaction Unbalanced <br>";}
if($j==1){$msg = "Type Help for a list of commands";} if($j==2){$msg =" Type '-X ? -Y ? -Z ? -W ?' to balance equation or Help for a list of commands";} if($j==3){$msg = "Type '-H2 ? -CO2 ? -H2O ? -CH4 ?' to enter feedrates in kmol/h or Help for a list of commands";} if($j==4){$msg = "Type Help for a list of commands";}

$fp = fopen('Sabatier_Reactor.txt', 'w+');
fwrite($fp, '<span id="a">Linuxcmd</span><span id="b">~</span><span id="c">$</span> Entering the Sabatier Reactor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp [ Ok ] <br/><br/>

&nbsp;____&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_               
/ ___|&nbsp;&nbsp;&nbsp;&nbsp;__ _&nbsp;&nbsp;| |__&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__ _&nbsp;&nbsp;| |_&nbsp;&nbsp;(_)&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;_ __ 
\___ \&nbsp;&nbsp;&nbsp;/ _` | | `_ \&nbsp;&nbsp;&nbsp;/ _` | | __| | |&nbsp;&nbsp;/ _ \ | `__|
&nbsp;___) | | (_| | | |_) | | (_| | | |_&nbsp;&nbsp;| | |&nbsp;&nbsp;__/ | |   
|____/&nbsp;&nbsp;&nbsp;\__,_| |_.__/&nbsp;&nbsp;&nbsp;\__,_|&nbsp;&nbsp;\__| |_|&nbsp;&nbsp;\___| |_|   
&nbsp;____&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_                  
|&nbsp;&nbsp;_ \&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;&nbsp;__ _&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;| |_&nbsp;&nbsp;&nbsp;&nbsp;___&nbsp;&nbsp;&nbsp;&nbsp;_ __ 
| |_) |&nbsp;&nbsp;/ _ \&nbsp;&nbsp;/ _` |&nbsp;&nbsp;/ __| | __|&nbsp;&nbsp;/ _ \&nbsp;&nbsp;| `__|
|&nbsp;&nbsp;_ <&nbsp;&nbsp;|&nbsp;&nbsp;__/ | (_| | | (__&nbsp;&nbsp;| |_&nbsp;&nbsp;| (_) | | |   
|_| \_\&nbsp;&nbsp;\___|&nbsp;&nbsp;\__,_|&nbsp;&nbsp;\___|&nbsp;&nbsp;\__|&nbsp;&nbsp;\___/&nbsp;&nbsp;|_|   
                                                   
__________________________________________________________________________________

<p>Loading Sabatier Reactor Inputs..... <br>---------------------------------------------------------------------------------- <!-- oqwipjefqwioefjwioqfjoiqwjfeioqwjefoi --><br> ' . $srb . ' ' . $sr1 . ' <br>----------------------------------------------------------------------------------</p> 
<!--laglaglaglaglaglaglaglaglaglaglaglag -->
<p> ' . $msg . ' </p> ');

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
Typer.file="Sabatier_Reactor.txt";
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
 || form.cmd.value == "Hint"
 || form.cmd.value == "Liquefaction"
 || form.cmd.value == "Marco Polo"
 || form.cmd.value == "Power Production"
 || form.cmd.value == "Science Rover"
 || form.cmd.value == "Soil Processing"
 || form.cmd.value == "Time"
 || form.cmd.value == "Water Cleanup"
 || form.cmd.value == "Water Processing"
 || form.cmd.value == "-X 4 -Y 1 -Z 2 -W 1"
 || form.cmd.value == "-H2 1 -CO2 2 -H2O 3 -CH4 4"
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