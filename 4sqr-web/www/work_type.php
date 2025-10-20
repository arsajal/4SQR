<!DOCTYPE html>
<html lang="en-US">
<head>
<?php $pgTitle = "work type &#8211; foursquare"; require_once("head.php"); ?>
</head>

<body class="wp-singular page-template page-template-page-architecture page-template-page-architecture-php page page-id-7 wp-theme-prantography ">

<div class="page-body-cntlr">

<div class="bdoverlay"></div>

<?php require_once("menu.php"); ?>

<div class="loding" id="loading-eff">
	<div class="loding-inr">
		<img src="images/logo-2.png" alt="">
		<span class="loding-logo-overlay"></span>
	</div>
</div>

<script>
var ls = localStorage.getItem('arcandint');
var x = document.getElementById("loading-eff");
console.log(ls);
if( ls == '1'){
    x.style.display = "none";
    //localStorage.setItem('arcandint', '1');
}
</script>

<?php
$name = "";
if(isset($_REQUEST['name'])) { $name = trim($_REQUEST['name']); }
?>
<footer class="footer-wrp" style='padding-top:0px; padding-bottom:40px;'>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-inr" style='border-bottom:1px solid #bbb;'>
					<div class="ftr-copyright">
						<p><h3 class="fl-h3 cgiid-title"><a href='works.php' style='text-decoration:none;'>WORKS</a> &nbsp;&raquo;&nbsp; <?php echo $name; ?></h3></p>
					</div>
				</div>
			</div>
		</div>
	</div> 
</footer>

<section class="architecture-page-con-cntlr">
<div class="architecture-grds-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="architecture-cat-items-cntlr">
					<ul class="reset-list ptg-2-grids">
					
					<?php
					if(isset($_REQUEST['name'])) {
						$name = trim($_REQUEST['name']);
						
						require_once("dbcon.php");
						$i = 0;
						$sql = "select * from `$db`.`works` where status='y' and work='$name' order by id desc;";
						$r = mysqli_query($dbcon, $sql) or die($sql);
						while($row = mysqli_fetch_array($r, MYSQLI_BOTH))
						{
							?>
							<li>
								<div class="cat-grid-item-col">
									<div class="cat-grid-item cgiid-title-scale">
										<div class="cat-grd-itm-img-cntlr">
											<a class="overlay-link" href="work_details.php?work=<?php echo $row['work']; ?>&client=<?php echo urlencode($row['client']); ?>&cid=<?php echo $row['id']; ?>"></a>
											<div class="cat-grd-itm-img-bg"></div>
											<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('works/<?php echo $row['id']; ?>/<?php echo $row['intro']; ?>.jpg');"></div>
											<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title"><?php echo $row['client']; ?></h3></div>
										</div>
									</div>
								</div>
							</li>
							<?php
						}
						mysqli_close($dbcon);
					}
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
