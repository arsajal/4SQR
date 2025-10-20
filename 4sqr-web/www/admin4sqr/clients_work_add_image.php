<?php session_start();
require("session.php");

require_once('../ts.php');
require_once('../dbcon.php');

if(isset($_REQUEST['id']) && isset($_REQUEST['name']) && isset($_REQUEST['work'])) {
	$id = $_REQUEST['id'];
	$client = $_REQUEST['name'];
	$work = $_REQUEST['work'];
}
else {
	die("<script>window.location='client_work.php'</script>");
}
?>

<html>
<head>
<meta http-equiv="refresh" content="300">
<?php require_once('head.php'); ?>
</head>

<body>
<?php
$menu = 'clientswork';
require_once('menu.php');

//UPLOAD
if(isset($_POST['submitPic']))
{
	$targetDir = "../works/".$id."/";
	if(!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }
	$i = 0;
	foreach($_FILES['file1']['name'] as $key => $filename) {
		$i++;
		$pic = $now1 = date('ymdHis', $ts+$i);
		
		$tmp_name = $_FILES['file1']['tmp_name'][$key];
		$target = $targetDir."$pic.jpg";
		move_uploaded_file($tmp_name, $target) or exit();
		
		$sql2 = "insert ignore into `$db`.`works_details` values (null, '$id', '$pic', 'y', '$now1', '$u', null, null);";
		mysqli_query($dbcon, $sql2) or die($sql2);
	}
	/*
	if($_FILES["file1"]["error"] > 0) { }
	else {
		$targetDir = "../works/".$id."/";
		if(!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }
		$target = $targetDir."$pic.jpg";
		move_uploaded_file($_FILES["file1"]["tmp_name"], $target) or exit();
	}
	$sql2 = "insert ignore into `$db`.`works_details` values (null, '$id', '$pic', 'y', '$now', '$u', null, null);";
	mysqli_query($dbcon, $sql2) or die($sql2);
	*/
	?>
	<script type=text/javascript>alert("Client's Work image uploaded.")</script>
	<?php
}

//REMOVE
if(isset($_POST['submitDelete']))
{
	$sl = $_POST['sl'];
	$pic = $_POST['pic'];
	$sql2 = "update `$db`.`works_details` set status='d', removeOn='$now', userid2='$u' where sl='$sl' and pic='$pic' and id='$id';";
	mysqli_query($dbcon, $sql2) or die($sql2);
	?>
	<script type=text/javascript>alert("Image removed.")</script>
	<?php
}
?>

<br>
<div class=cat style='padding:15px;'>
<table border="0" cellpadding=15 cellspacing=0>
<form name='frmUpload' method='post' action="clients_work_add_image.php?id=<?php echo $id; ?>&name=<?php echo urlencode($client); ?>&work=<?php echo urlencode($work); ?>" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to upload ?')">
<tr>
	<td>
		<h3 class='client_title'><?php echo $work; ?> &raquo; <?php echo $client; ?></h3>
		<b>Upload &raquo; Client's Work Image</b><br>
		<br>
		Width 1500px, Height 1000px, JPG, RGB, 72 DPI<br>
		Image &nbsp;&nbsp;<input type="file" name="file1[]" id="file1" accept=".jpg,.jpeg,.JPG,.JPEG" multiple required><br><br>
		<input type='submit' name='submitPic' class='submit1' value="Upload">
	</td>
</tr>
</form>
</table>
<br><br>

<?php
$sql = "select * from `$db`.`works_details` where status='y' and id='$id' order by pic desc;";
$result = mysqli_query($dbcon, $sql) or die($sql);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$pic = $row['pic'];
	?>
	<form name="frmdel<?php echo $pic; ?>" border=1 method='post' action="clients_work_add_image.php?id=<?php echo $id; ?>&name=<?php echo urlencode($client); ?>&work=<?php echo urlencode($work); ?>" onsubmit="return confirm('Are you sure you want to remove Work ID # <?php echo $pic; ?> ?')">
	<table border=0 cellpadding=10 cellspacing=0 style="border-collapse: collapse" bgcolor='#DDDDDD'>
	<tr>
		<td width=260><img src="../works/<?php echo $id; ?>/<?php echo $pic; ?>.jpg" border=1 width=300></td>
		<td class=cat2>
			Pic # <?php echo $pic; ?><br>
			<br>
			Upload by: <?php echo $row['userid']; ?><br>
			Upload on: <?php echo $row['updateOn']; ?><br>
			<br>
			<input type='hidden' name='sl' value="<?php echo $row['sl']; ?>">
			<input type='hidden' name='pic' value="<?php echo $pic; ?>">
			<input type='submit' name='submitDelete' class='submit1' value="Remove Image">
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