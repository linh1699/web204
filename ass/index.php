<?php
require_once './commons/utils.php';

 //lấy dữ liệu bản ghi prodcut status=1
$productsQuery="select*from ".TABLE_PRODUCT." order by id desc
limit 8";
$stmt=$conn->prepare($productsQuery);
$stmt->execute();
$products=$stmt->fetchAll();
 //lấy bản ghi product status=2
$producQuery="select*from ".TABLE_PRODUCT." order by views desc
limit 8";
$stmt=$conn->prepare($producQuery);
$stmt->execute();
$produc=$stmt->fetchAll();

 //lấy dữ liệu bản ghi slideshow

$siteUrl= "http://localhost:81/ass/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FORD CUS</title>
	<meta charset="utf-8">
	<?php
	include './share/header_asset.php';
	?>
	<?php include'./share/style_assets.php';
	?>
	<?php
	include'./share/script_assets.php';
	?>
</head>


<style type="text/css">
.sp{padding-top: 0px;}
.card{height: 230px; position
	: relative;overflow: hidden;}
.an{; position: absolute;bottom: 0px;padding-top: -20px;;width: 25rem}
.an:hover{bottom: 0; }

.lh a:hover{color: red; font-size:18px; font-weight: 900;}


</style>

<body>	
	
	<?php 
	include'./share/header.php';

	include './share/slide.php';
	?>
	<div class="container">
		<h1 class="spkm">New Cars</h1>
		<div class="row">
			<?php
			foreach ($products as $sp) {
				?>
				<div class="col-sm-3 sp " style="padding-top: 15px">
					<div class="card" style="width: 25rem;">	
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $sp['id']?>"><img class="card-img-top" src="<?= $sp['image'] ?>" alt="Card image cap" height="150"></a>
							<div class="card-body an">
							<h4 class="card-title" style="font-weight: 900"><?= $sp['product_name'] ?></h4>
							<?php /*  
							<p class="text" style="font-size: 16px; color: #ffc107"><del>Giá cũ: <?= $sp['list_price'] ?>VNĐ</del></p>
							<p class="ban" style="color: red; font-size: 18px">Giá Bán: <?= $sp['sell_price'] ?> VNĐ</p>*/
							?>
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $sp['id']?>" class="btn btn-primary">Chi Tiết</a>	
						</div>
					</div>
				</div>
				

			<?php } ?>
			
		</div>
	</div>

	<div class="container">
		<h1 class="spkm">Views Cars </h1>
		<div class="row">
			<?php
			foreach ($produc as $focus) {
				?>
				<div class="col-sm-3 sp" style="padding-top: 15px">
					<div class="card" style="width: 25rem;">
						<a href="<?= $siteUrl?>chitiet.php?id=<?= $focus['id']?>"><img class="card-img-top" src="<?= $focus['image'] ?>" alt="Card image cap" height="150"></a>
						<div class="card-body an">
							<h4 class="card-title" style="font-weight: 900"><?= $sp['product_name'] ?></h4>
							<?php  /*
							<p class="text" style="font-size: 16px; color: #ffc107"><del>Giá cũ: <?= $sp['list_price'] ?>VNĐ</del></p>
							<p class="ban" style="color: red; font-size: 18px">Giá Bán: <?= $sp['sell_price'] ?> VNĐ</p>*/
							?>
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $sp['id']?>" class="btn btn-primary">Chi Tiết</a>	
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

<?php 
include'./share/brands.php';
 ?>


	<?php 
	include'./share/footer.php';
	?>


