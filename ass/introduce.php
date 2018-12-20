<?php 
require_once 'commons/utils.php';
$top3="select*from ".TABLE_PRODUCT." order by id desc
						limit 3";
$stmt=$conn->prepare($top3);
$stmt->execute();
$top=$stmt->fetchAll();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giới Thiệu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	include'share/header_asset.php';
	 ?>

</head>
<style type="text/css">
	.lh a:hover{color: red; font-size:18px; font-weight: 900;}
</style>
<body>	
<?php 
include './share/header.php';
 ?>

<hr style="margin-top:4px; border-radius:2px"/>

</section>
     
	
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 intro" style="font-size: 18px; line-height: 34px; ">
				  <center> <h1 class="gt">* GIỚI THIỆU *</h1></center><br>
				CÂU CHUYỆN THƯƠNG HIỆU

Teafox Việt Nam là thương hiệu trà sữa cao cấp và được yêu thích nhất năm 2017 và hiện tại đã có 15 cửa hàng tại Việt Nam. Đồ uống của Teafox được yêu thích bởi lớp kem cheese sánh mịn kết hợp với hương vị trà nhập khẩu từ Đài Loan. Hơn thế nữa, trà hoa quả heytea được khách hàng đánh giá cao bởi hương vị đặc sắc và đậm đà
Từ một công ty sản xuất trà sạch, thơm ngon nổi tiếng với những vùng nguyên liệu rộng lớn, là kết quả của sự không ngừng tìm kiếm với mong muốn tạo ra một sự kết hợp hoàn hảo của văn hóa trà Trung hoa và xu hướng khẩu vị của giới trẻ Châu Á, những ly trà sữa đầu tiên đã ra đời. <br>
<center><img src="<?= $siteUrl. 'image/oto12.jpg'?>" width="600" ></center>
<br>	
Khi vẻ đẹp của văn hóa được hiện hữu nhưng mang hơi thở đậm nét trẻ trung của thời đại, Teafox nhận được đông đảo sự yêu thích của giới trẻ với vị kem cheese đặc trưng. Đến năm 2013, Teafox đã phát triển hệ thống trên 300 cửa hàng khắp Hong Kong, Đài Loan, Canada, Mỹ và Trung Quốc. 
Tháng 8 năm 2017, Teafox chính thức ra mắt thị trường Việt Nam với cửa hàng đầu tiên tại Phạm Ngọc Thạch, Hà Nội và trong thời gian 5 tháng trở lại đây, Teafox đã không ngừng cố gắng để phát triển thêm các cửa hàng tại Hà Nội, TP. HCM. 
Không ngừng nghỉ, Teafox luôn tâm niệm được mang những sản phẩm trà tinh khiết nhất, vượt trội nhất và thơm ngon nhất tới cho người dùng.
			</div>
	<div id="q2" class="col-6 col-md-4 product">
		<h2>Sản Mới Ra Mắt</h2>
		<?php foreach ($top as $three) :?>
		
		<div class="card" style="width: 30rem;margin-top: 10px">	
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $three['id']?>"><img class="card-img-top" src="<?= $three['image'] ?>" alt="Card image cap" height="200"></a>
							<div class="card-body an">
							<h4 class="card-title" style="font-weight: 900"><?= $three['product_name'] ?></h4>
							<p class="text" style="font-size: 16px; color: #ffc107"><del>Giá cũ: <?= $three['list_price'] ?>VNĐ</del></p>
							<p class="ban" style="color: red; font-size: 18px">Giá Bán: <?= $three['sell_price'] ?> VNĐ</p>
							<a href="<?= $siteUrl?>chitiet.php?id=<?= $three['id']?>" class="btn btn-primary">Chi Tiết</a>	
						</div>
					</div>
		<?php endforeach ?>
</div>

</div>
</div>

<?php 
include 'share/footer.php';
 ?>