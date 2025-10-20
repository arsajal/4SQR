<?php session_start();
$flag=0;
if(isset($_SESSION['user']) && isset($_SESSION['pass'])) { echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"2; url=home.php\">"; exit(); }

if(isset($_POST['submit']))
{
	$u = $_POST['user'];
	$p = $_POST['pass'];
	
	if(($u=="admin" && $p=="password") || ($u=="aminmehedi" && $p=="asusdvd"))
	{
		$_SESSION['user'] = "$u";
		$_SESSION['pass'] = "$p";
		
		echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"2; url=home.php\">";
		exit();
	}
	$flag=1;
}
?>

<html>
<head>
<?php require("head.php"); ?>
<style type="text/css">
body{
	background-color: #B6292F;
	margin: 20 20 20 20;
}
.eng
{
	font-style : normal;
	font-weight : bold;
	font-family : verdana;
	font-size : 12px;
	color : #000000;
}
</style>
</head>

<body>
<table border=0 width="100%" height="100%" cellpadding=0 cellspacing=0 bgcolor=#F9FAFC>
	<tr>
		<td align="center">
		<img src="../images/logo.png"><br><br><br>
<?php
	if($flag==1) {	echo "<font size=3 color=#FF0000><b>Username / Passowrd does not match.</b></font><br><br><br>"; }
?>
		<form method="POST" action="index.php" class=eng>
			Username &nbsp;<input type=text name="user" size="15" maxlength=10 required><br><br>
			Password &nbsp;<input type=password name="pass" size="15" maxlength=10 required><br><br><br>
			<input type="submit" value="Submit" name="submit">
		</form>
		</td>
	</tr>
</table>

</body>

</html>