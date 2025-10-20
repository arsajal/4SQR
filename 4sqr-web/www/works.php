<!DOCTYPE html>
<html lang="en-US">
<head>
<?php $pgTitle = "work &#8211; foursquare"; require_once("head.php"); ?>
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

<section class="architecture-page-con-cntlr">
<div class="architecture-grds-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="architecture-cat-items-cntlr">
					<ul class="reset-list ptg-2-grids">
					<?php
					require_once('dbcon.php');
					$sql = "select * from `$db`.`work_group` where status='y' order by title;";
					$result = mysqli_query($dbcon, $sql) or die($sql);
					while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
					{
						$id = $row['id'];
						$title = strtoupper($row['title']);
						$bgpic = $row['bgpic'];
						?>
						<li>
							<div class="cat-grid-item-col">
								<div class="cat-grid-item cgiid-title-scale">
									<div class="cat-grd-itm-img-cntlr">
										<a class="overlay-link" href="work_type.php?name=<?php echo urlencode($title); ?>"></a>
										<div class="cat-grd-itm-img-bg"></div>
										<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/workbg/<?php echo $bgpic; ?>.jpg');"></div>
										<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title"><?php echo $title; ?></h3></div>
									</div>
								</div>
							</div>
						</li>
						<?php
					}
					mysqli_free_result($result);

					mysqli_close($dbcon);
					?>
					<!--
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=OFFICE"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/ARA-Design-Studio-15-Office-Website.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">OFFICE</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=SCULPTURE"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/Residence.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">SCULPTURE</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=FACADE"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/Mitshibishi-Showroom-9-copy.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">FACADE</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=ART-CONCERT"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/yum-cha-district-2-prantography.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">ART CONCERT</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=LANDSCAPING"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/Commercial.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">LANDSCAPING</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=METAL-FABRICATION"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/Industrial.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">METAL FABRICATION</h3></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="cat-grid-item-col">
							<div class="cat-grid-item cgiid-title-scale">
								<div class="cat-grd-itm-img-cntlr">
									<a class="overlay-link" href="work_type.php?name=WOODEN-METEL-CNC"></a>
									<div class="cat-grd-itm-img-bg"></div>
									<div class="cat-grd-itm-img inline-bg bg-imgH" data-height="667" data-width="1000" style="background-image: url('images/work/IMG_3852.jpg');"></div>
									<div class="cat-grd-itm-img-des"><h3 class="fl-h3 cgiid-title">WOODEN CNC & METEL CNC</h3></div>
								</div>
							</div>
						</div>
					</li>
					-->
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
