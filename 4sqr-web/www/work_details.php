<?php
if(isset($_REQUEST['work']) && isset($_REQUEST['client']) && isset($_REQUEST['cid'])) {
	$work = trim($_REQUEST['work']);
	$client = trim($_REQUEST['client']);
	$id = trim($_REQUEST['cid']);
	
	require_once("dbcon.php");
	$found = false;
	$sql = "select * from `$db`.`works` where status='y' and work='$work' and id='$id' and client='$client';";
	$r = mysqli_query($dbcon, $sql) or die($sql);
	while($row = mysqli_fetch_array($r, MYSQLI_BOTH))
	{
		$found = true;
		$details = $row['details'];
	}
	
	if($found == false) { mysqli_close($dbcon); header("location: index.php"); }
}
else { header("location: index.php"); }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<?php $pgTitle = "work details &#8211; $client"; require_once("head.php"); ?>
</head>

<body class="wp-singular architecture-template-default single single-architecture postid-9211 wp-theme-prantography ">

<div class="page-body-cntlr">

<div class="bdoverlay"></div>

<?php require_once("menu.php"); ?>

<footer class="footer-wrp" style='padding-top:0px; padding-bottom:40px;'>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-inr" style='border-bottom:1px solid #bbb;'>
					<div class="ftr-copyright">
						<p><h3 class="fl-h3 cgiid-title"><a href='works.php' style='text-decoration:none;'>WORKS</a> &nbsp;&raquo;&nbsp; <a href='work_type.php?name=<?php echo $work; ?>' style='text-decoration:none;'><?php echo $work; ?></a> &nbsp;&raquo;&nbsp; <?php echo $client; ?></h3></p>
					</div>
				</div>
			</div>
		</div>
	</div> 
</footer>

<section class="architecture-single-page-con-cntlr">
<div class="architecture-single-page-des">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="artetr-single-des-cntlr">
					<p style="text-align: center;"><b><?php echo $client; ?></b></p>
					<?php if($details!=null || $details!="") { ?><p style="text-align: center;"><?php echo $details; ?></p><?php } ?>
					<br>
					<p style="text-align: center;"><b>© FourSquare</b>, All rights reserved</p>
					<p style="text-align: center;">Do not use or publish these photographs without any prior permission.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="architecture-single-grds-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="architecture-cat-items-cntlr">
				<ul class="reset-list ptg-4-grids">
				
				<?php
				$sql = "select * from `$db`.`works_details` where status='y' and id='$id' order by pic;";
				$r = mysqli_query($dbcon, $sql) or die($sql);
				while($row = mysqli_fetch_array($r, MYSQLI_BOTH))
				{	?>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item">
								<div class="cat-grd-itm-img-cntlr">
									<a href="works/<?php echo $id; ?>/<?php echo $row['pic']; ?>.jpg" data-fancybox="gallery">
										<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="600" data-width="600" style="background-image: url('works/<?php echo $id; ?>/<?php echo $row['pic']; ?>.jpg');"></div>
									</a>
								</div>
							</div>
						</div>
					</li>
					<?php
				}
				mysqli_close($dbcon);
				?>
				
				</ul>
				</div>
			</div>
		</div>
	</div> 
</div> 

</section>

<?php require_once("footer.php"); ?>

</div>
<!-- PAGE END -->

<?php require_once("js.php"); ?>

</body>
</html>
