<?php 
require_once './commons/utils.php';
$cateId = $_GET['id'];
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 8;
$sql = "select 
			c.*,
			count(p.id) as total_product
		from categories c
		join products p
		on c.id = p.cate_id 
		where c.id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();
if(!$cate){
	header("location: $siteUrl");
	die;
}
$offset = ($pageNumber-1)*$pageSize;
$sql = "	select * 
			from products 
			where cate_id = $cateId
			limit $offset, $pageSize";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include'share/header_asset.php';
	?>
	<title><?= $cate['name']?></title>
</head>
<style type="text/css">
	.lh a:hover{color: red; font-size:18px; font-weight: 900;}
</style>
<body>
	<?php 
	include './share/header.php';
	?>

	<div class="container">
	
		<p class="danhmuc" style="margin-top:50px">	<h1><?= $cate['name']?></h1>
		</p>
		<div class="row">
			<?php
			foreach ($products as $sp) {
				?>
				<div class="col-sm-3" style="padding-top: 15px">
					<div class="card" style="width: 25rem;" >	
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $sp['id']?>"><img class="card-img-top" src="<?= $sp['image'] ?>" alt="Card image cap" height="150"></a>
							<div class="card-body an">
							<h4 class="card-title" style="font-weight: 900"><?= $sp['product_name'] ?></h4>
							<p class="text" style="font-size: 16px; color: #ffc107"><del>Giá cũ: <?= $sp['list_price'] ?>VNĐ</del></p>
							<p class="ban" style="color: red; font-size: 18px">Giá Bán: <?= $sp['sell_price'] ?> VNĐ</p>
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $sp['id']?>" class="btn btn-primary">Chi Tiết</a>	
						</div>
					</div>
				</div>
				
			<?php } ?>

		</div>
		<br>
		<div class="paginate" style="margin-left: 500px"></div>
	</div>


	<?php 
	include './share/footer.php';
	?>
		<script src="<?=$siteUrl?>plugins/simplePagination/jquery.simplePagination.js"></script>

	<script type="text/javascript">
	 	$(function() {
		    $('.paginate').pagination({
		        items: <?= $cate['total_product']?>,
		        itemsOnPage: <?= $pageSize?>,
		        currentPage: <?= $pageNumber?>,
		        cssStyle: 'light-theme',
		        onPageClick: function(page){
		        	var url = '<?= $siteUrl . 'cate.php?id=' . $cateId?>';
					url+= `&page=${page}`;
					window.location.href = url;      
		        }
		    });
		});
	 </script>
</body>

</html>





