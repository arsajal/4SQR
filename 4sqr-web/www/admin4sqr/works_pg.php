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
$menu = 'workspg';
require_once('menu.php');

//UPLOAD
if(isset($_POST['submitPic']) && isset($_POST['title']))
{
	$t = date('ymdHis', $ts);
	$title = strtoupper(trim($_POST['title']));
	if($_FILES["file1"]["error"] > 0) { }
	else {
		$target = "../images/workbg/".$t.".jpg";
		move_uploaded_file($_FILES["file1"]["tmp_name"], $target) or exit();
	}
	
	$sql2 = "update `$db`.`work_group` set bgpic='$t', status='y', updateOn='$now', userid='$u', removeOn=null, userid2=null where title='$title';";
	mysqli_query($dbcon, $sql2) or die($sql2);
	
	if(mysqli_affected_rows($dbcon) > 0) {
	    $sql2 = "insert ignore into `$db`.`work_group` values (null, '$t', '$title', '$t', y', '$now', '$u', null, null);";
	    mysqli_query($dbcon, $sql2) or die($sql2);    
	}
	?>
	<script type=text/javascript>alert("Work Page Background image & title uploaded.")</script>
	<?php
}

//REMOVE
if(isset($_POST['submitDelete']))
{
	$sl = $_POST['sl'];
	$id = $_POST['id'];
	$sql2 = "update `$db`.`work_group` set status='d', removeOn='$now', userid2='$u' where sl='$sl' and id='$id';";
	mysqli_query($dbcon, $sql2) or die($sql2);
	?>
	<script type=text/javascript>alert("Work Page Background image & title removed.")</script>
	<?php
}
?>

<br>
<div class=cat style='padding:15px;'>
<table border="0" cellpadding=15 cellspacing=0>
<form name='frmUpload' method='post' action="works_pg.php" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to upload ?')">
<tr>
	<td>
		<b>Upload &raquo; Work Page Background Image & Title</b><br><br>
		Title: <input type='text' name='title' maxlength=30 size=30 placeholder='type work title here' required><br><br>
		Size : Width 690px, Height 460px, JPG, RGB, 72 DPI<br>
		Image &nbsp;&nbsp;<input type="file" name="file1" id="file1" accept=".jpg,.jpeg,.JPG,.JPEG" required><br><br>
		<input type='submit' name='submitPic' class='submit1' value="Upload">
	</td>
</tr>
</form>
</table>
<br><br>

<?php
$sql = "select * from `$db`.`work_group` where status='y' order by title;";
$result = mysqli_query($dbcon, $sql) or die($sql);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$id = $row['id'];
	?>
	<form name="frmdel<?php echo $id; ?>" border=1 method='post' action="works_pg.php" onsubmit="return confirm('Are you sure you want to remove Work ID # <?php echo $id; ?> ?')">
	<table border=0 cellpadding=10 cellspacing=0 style="border-collapse: collapse" bgcolor='#DDDDDD'>
	<tr>
		<td width=260><img src="../images/workbg/<?php echo $id; ?>.jpg" border=1 width=345></td>
		<td class=cat2>
			Title Name # <b><?php echo strtoupper($row['title']); ?></b><br>
			<br>
			Work ID # <?php echo $id; ?><br>
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