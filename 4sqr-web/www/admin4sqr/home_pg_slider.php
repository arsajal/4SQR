<?php session_start();
require("session.php");

require_once('../ts.php');
require_once('../dbcon.php');
?>

<html>
<head>
<meta http-equiv="refresh" content="300">
<?php require_once('head.php'); ?>
</head>

<body>
<?php
$menu = 'homepg';
require_once('menu.php');

//UPLOAD
if(isset($_POST['submitPic']))
{
	$t = date('ymdHis', $ts);
	
	if($_FILES["file1"]["error"] > 0) { }
	else {
		$target = "../images/slider/".$t.".jpg";
		move_uploaded_file($_FILES["file1"]["tmp_name"], $target) or exit();
	}
	
	$sql2 = "insert into `$db`.`home_slider` values (null, '$t', 'y', '$now', '$u', null, null);";
	mysqli_query($dbcon, $sql2) or die($sql2);
	?>
	<script type=text/javascript>alert("Home Page Slider image uploaded.")</script>
	<?php
}

//REMOVE
if(isset($_POST['submitDelete']))
{
	$sl = $_POST['sl'];
	$id = $_POST['id'];
	$sql2 = "update `$db`.`home_slider` set status='d', removeOn='$now', userid2='$u' where sl='$sl' and id='$id';";
	mysqli_query($dbcon, $sql2) or die($sql2);
	?>
	<script type=text/javascript>alert("Home Page Slider image removed.")</script>
	<?php
}
?>

<br>
<div class=cat style='padding:15px;'>
<table border="0" cellpadding=15 cellspacing=0>
<form name='frmUpload' method='post' action="home_pg_slider.php" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to upload ?')">
<tr>
	<td>
		<b>Upload &raquo; Home Page Slider Image</b><br><br>
		Size: Width 1920px, Height 1080px, JPG, RGB, 72 DPI<br><br>
		Image &nbsp;&nbsp;<input type="file" name="file1" id="file1" accept=".jpg,.jpeg,.JPG,.JPEG" required><br><br>
		<input type='submit' name='submitPic' class='submit1' value="Upload">
	</td>
</tr>
</form>
</table>
<br><br>

<?php
$sql = "select * from `$db`.`home_slider` where status='y' order by updateOn desc;";
$result = mysqli_query($dbcon, $sql) or die($sql);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$id = $row['id'];
	?>
	<form name="frmdel<?php echo $id; ?>" border=1 method='post' action="home_pg_slider.php" onsubmit="return confirm('Are you sure you want to remove Pic ID # <?php echo $id; ?> ?')">
	<table border=0 cellpadding=10 cellspacing=0 style="border-collapse: collapse" bgcolor='#DDDDDD'>
	<tr>
		<td width=260><img src="../images/slider/<?php echo $id; ?>.jpg" border=1 width=250></td>
		<td class=cat2>
			Pic ID # <?php echo $id; ?><br>
			Upload by: <?php echo $row['userid']; ?><br>
			Upload on: <?php echo $row['updateOn']; ?><br>
			<br>
			<input type='hidden' name='sl' value="<?php echo $row['sl']; ?>">
			<input type='hidden' name='id' value="<?php echo $id; ?>">
			<input type='submit' name='submitDelete' class='submit1' value="Remove">
		</td>
		<td>&nbsp;</td>
	</tr>
	</table>
	</form>
	<?php
}
mysqli_free_result($result);

mysqli_close($dbcon);
?>

</div>
</body>
</html>