<?php 
require_once './commons/utils.php';


//lấy bảng websetting cho header và footer
$websettingQuery="select*from ". TABLE_WEBSETTING;
$stmt=$conn->prepare($websettingQuery);
$stmt->execute();
$setting=$stmt->fetch();
?>

<div class="footer" style="margin-top:20px; background: #000;font-weight: 900;">
	<div class="container ">
		<div class="row ">
			<div class="col-sm-4 text-warning lh" style="font-size: 16px;">
				<br>
				<p><a href="index.php">Trang Chủ</a></p>
				<p><a href="introduce.php">Giới Thiệu</a></p>
				<p><a href="contact.php">Liên Hệ</a></p>
				<p><a href="gmail.com">Email:<?= $setting['email']?></a></p>
				<p><a href="contact.php">Hotline: <?= $setting['hotline']?></a></p>
			</div>
			<div class="col-sm-4 maps">
				<br>
				<?= $setting['map'] ?>
			</div>
			<div class="col-sm-4 fan">
				<br>
				<?= $setting['fb'] ?>
			</div>
		</div>
	</div>
</div>

</body>
</html>