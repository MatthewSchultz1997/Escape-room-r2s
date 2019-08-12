<!-- Login page for the mainframe-->

<html>
<head>
<title>Module Login Page</title>
</head>
<body>
<form name="loginForm" method="post" action="module_redirect.php">
<table width="25%" bgcolor="0099CC" align="center">

<tr>
<td colspan=2><center><font size=4><b>Module Login Page</b></font></center></td>
</tr>

<tr>
<td>IP Address:</td>
<td><input type="text" size=25 name="userip"></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="test" size=25 name="pwd"></td>
</tr>

<tr>
<td ><input type="Reset"></td>
<td><input type="submit" onclick="return check(this.form)" value="Login"></td>
</tr>

</table>
</form>
<script language="javascript">
function check(form)
{
if( form.userip.value == "192.168.1.101" && form.pwd.value == "password1"
 || form.userip.value == "192.168.1.102" && form.pwd.value == "password2"
 || form.userip.value == "192.168.1.103" && form.pwd.value == "password3"
 || form.userip.value == "192.168.1.104" && form.pwd.value == "password4"
 || form.userip.value == "192.168.1.105" && form.pwd.value == "password5"
 || form.userip.value == "192.168.1.106" && form.pwd.value == "password6"
 || form.userip.value == "192.168.1.107" && form.pwd.value == "password7"
 || form.userip.value == "192.168.1.108" && form.pwd.value == "password8"
)
{
	return true;
}
else
{
	alert("Error Password or IP Address")
	return false;
}
}
</script>

</body>
</html>
