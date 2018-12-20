

<?php
require_once './commons/utils.php';
//lấy dữ liệu bảng slidershow
$slidersQuery="select*from ".TABLE_SLIDERSHOW." where status=1 
				order by order_number";
$stmt=$conn->prepare($slidersQuery);
$stmt->execute();
$sliders=$stmt->fetchAll();
?>
<div id="slideShow">
	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php 
				for($i=0; $i <count($sliders); $i++){
					$act = $i ===0 ? "active" :"";

					?>
					<li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="<?= $act ?>"></li>

					
				<?php } ?>
			</ol>

			<div class="carousel-inner">
				<?php
				$count=0;
				foreach ($sliders as  $item) {
					$act= $count ===0 ? "active" : "";
					?>

					<div class="item <?= $act ?>">
						<img src="<?= $siteUrl . $sliders[$count]['image'] ?>">
					</div>
					<?php 
					$count++;
				}
				?>

			</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
	</div>
</div>