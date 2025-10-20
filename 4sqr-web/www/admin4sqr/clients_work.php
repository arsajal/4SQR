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
$menu = 'clientswork';
require_once('menu.php');

//UPLOAD
if(isset($_POST['submitPic']) && isset($_POST['client']))
{
	$work = trim($_POST['work']);
	$client = strtoupper(trim($_POST['client']));
	$details = trim($_POST['details']);
	$id = $intro = date('ymdHis', $ts);
	
	$work    = mysqli_real_escape_string($dbcon, $work);
	$client  = mysqli_real_escape_string($dbcon, $client);
	$details = mysqli_real_escape_string($dbcon, $details);
	
	if($_FILES["file1"]["error"] > 0) { }
	else {
		$sql2 = "insert ignore into `$db`.`works` values (null, '$work', '$client', '$id', '$intro', '$details', 'y', '$now', '$u', null, null);";
		mysqli_query($dbcon, $sql2) or die($sql2);
		
		if(mysqli_affected_rows($dbcon)) {
			$targetDir = "../works/".$id."/";
			if(!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }
			if(!is_file("../works/$id/index.php")) { copy("../works/index.php", "../works/$id/index.php"); }
			
			$target = $targetDir."$intro.jpg";
			move_uploaded_file($_FILES["file1"]["tmp_name"], $target) or exit();
		}
		else {
			$sql2 = "update `$db`.`works` set intro='$intro', details='$details', status='y', updateOn='$now', userid='$u', removeOn=null, userid2=null where work='$work' and client='$client';";
			mysqli_query($dbcon, $sql2) or die($sql2);
			
			$sql = "select id from `$db`.`works` where work='$work' and client='$client';";
			$result = mysqli_query($dbcon, $sql) or die($sql);
			while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { $id = $row[0]; }
			
			$targetDir = "../works/".$id."/";
			if(!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }
			if(!is_file("../works/$id/index.php")) { copy("../works/index.php", "../works/$id/index.php"); }
			
			$target = $targetDir."$intro.jpg";
			move_uploaded_file($_FILES["file1"]["tmp_name"], $target) or exit();
		}
	}
	?>
	<script type=text/javascript>alert("Client Work intro image & title uploaded.")</script>
	<?php
}

//REMOVE
if(isset($_POST['submitDelete']))
{
	$sl = $_POST['sl'];
	$id = $_POST['id'];
	$sql2 = "update `$db`.`works` set status='d', removeOn='$now', userid2='$u' where sl='$sl' and id='$id';";
	mysqli_query($dbcon, $sql2) or die($sql2);
	?>
	<script type=text/javascript>alert("Clinet & Work removed.")</script>
	<?php
}
?>

<br>
<div class=cat style='padding:15px;'>
<table border="0" cellpadding=15 cellspacing=0>
<form name='frmUpload' method='post' action="clients_work.php" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to upload ?')">
<tr>
	<td>
		<b>Upload &raquo; Client's Work Upload Page</b><br>
		<br>
		Work Type &nbsp; : &nbsp;<select name='work' style='padding:4px 6px; font-size:14px;' required>
		<?php
		$sql = "select distinct(title) from `$db`.`work_group` where status='y' order by title;";
		$result = mysqli_query($dbcon, $sql) or die($sql);
		while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { echo "<option>".strtoupper($row[0])."</option>"; }
		?>
		</select><br>
		<br>
		Client Name : <input type='text' name='client' maxlength=30 size=30 style='padding:4px 6px; font-size:14px;' placeholder='type client name here' required><br>
		<br>
		<label style="vertical-align:top;">Work Details :</label>
		<style>textarea { resize: none; }</style>
		<textarea name="details" rows=10 cols=50 maxlength=500></textarea><br>
		<br>		
		<b>Intro Background</b> : Width 690px, Height 460px, JPG, RGB, 72 DPI<br>
		Image &nbsp;&nbsp;<input type="file" name="file1" id="file1" accept=".jpg,.jpeg,.JPG,.JPEG" required><br><br>
		<input type='submit' name='submitPic' class='submit1' value="Upload">
	</td>
</tr>
</form>
</table>
<br><br>

<?php
$sql = "select * from `$db`.`works` where status='y' order by client, work;";
$result = mysqli_query($dbcon, $sql) or die($sql);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$id = $row['id'];
	?>
	<form name="frmdel<?php echo $id; ?>" border=1 method='post' action="clients_work.php" onsubmit="return confirm('Are you sure you want to remove Work ID # <?php echo $id; ?> ?')">
	<table border=0 cellpadding=10 cellspacing=0 style="border-collapse: collapse" bgcolor='#DDDDDD'>
	<tr>
		<td width=260><img src="../works/<?php echo $id; ?>/<?php echo $row['intro']; ?>.jpg" border=1 width=345></td>
		<td class=cat2>
			Client Name # <b><?php echo strtoupper($row['client']); ?></b><br>
			Work Type # <b><?php echo strtoupper($row['work']); ?></b><br>
			<br>
			Client ID # <?php echo $id; ?><br>
			Upload by: <?php echo $row['userid']; ?><br>
			Upload on: <?php echo $row['updateOn']; ?><br>
			<br>
			<input type='hidden' name='sl' value="<?php echo $row['sl']; ?>">
			<input type='hidden' name='id' value="<?php echo $id; ?>">
			<a href="clients_work_add_image.php?id=<?php echo $id; ?>&name=<?php echo urlencode(strtoupper($row['client'])); ?>&work=<?php echo urlencode(strtoupper($row['work'])); ?>" class='submit1' style='border: 2px solid black; padding:5px 10px;'>Add Work Image</a> &nbsp; &nbsp;
			<input type='submit' name='submitDelete' class='submit1' value="Remove Client & Work">
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