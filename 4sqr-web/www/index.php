<!DOCTYPE html>
<html lang="en-US">
<head>
<?php $pgTitle = "foursquare"; require_once("head.php"); ?>
<link rel="preload" as="image" href="images/slider/1s.jpg">				<!-- Preload first image immediately -->
</head>

<body class="home wp-singular page-template-default page page-id-248 wp-theme-prantography is_safari has-banner ">

<div class="page-body-cntlr">

<div class="bdoverlay"></div>

<?php require_once("menu.php"); ?>

<div class="loding loding-home">
	<div class="loding-inr">    
		<div class="loading-img">
			<img src="images/logo-2.png" alt="">
			<span class="loding-logo-overlay"></span>
		</div>
	</div>
</div>

<!-- SLIDERS -->
<section class="home-slider-sec">
<div class="home-slider homeSlider">
	<?php
	require_once('dbcon.php');
	$sql = "select * from `$db`.`home_slider` where status='y' order by rand();";
	$result = mysqli_query($dbcon, $sql) or die($sql);
	while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
	{
		$id = $row['id'];
		?>
		<div class="home-slider-item">
			<div class="home-slider-img-cntlr" style='background:url(images/loading.gif) no-repeat center center;'>
				<div class="home-slider-img inline-bg" style="background: url(images/slider/<?php echo $id; ?>.jpg);"></div>
			</div>
		</div>
		<?php
	}
	mysqli_free_result($result);
	mysqli_close($dbcon);
	
	/*
	$numbers = range(1, 9);
	shuffle($numbers);
	$serial = implode('', $numbers);
	for($i=0; $i<9; $i++)
	{
		$img = substr($serial,$i,1);
		?>
		<div class="home-slider-item">
			<div class="home-slider-img-cntlr" style='background:url(images/loading.gif) no-repeat center center;'>
				<div class="home-slider-img inline-bg" style="background: url(images/slider/<?php echo $img; ?>s.jpg);"></div>
			</div>
		</div>
		<?php
	}
	*/
	?>	
</div>
</section>

<?php require_once("footer.php"); ?>

</div>
<!-- PAGE END -->

<?php require_once("js.php"); ?>

</body>
</html>
