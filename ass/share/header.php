<?php 
require_once './commons/utils.php';

//lấy bảng websetting cho header và footer
$websettingQuery="select*from web_setting";
$stmt=$conn->prepare($websettingQuery);
$stmt->execute();
$setting=$stmt->fetch();
 //lấy dữ liệu bản ghi categories
$cateQuery="select*from ".TABLE_CATEGORY;
$stmt=$conn->prepare($cateQuery);
$stmt->execute();
$cates=$stmt->fetchAll();

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
<style>
.header{background: #09121B; height: 50px;z-index: 1000; top: 0; left: 0;  }
.nav ul li a:hover{color: red;}
.sub-menu{
        display: none;
        position: absolute;
        top: 0;
        left: 100%;
        width: 150px;
     
       
    }
.nav li:hover>.sub-menu{
        display: block;

    }
.nav>li>.sub-menu{
        top: 40px;
        left: 0;
      	list-style: none;
    }

     
</style>
<div class="header">
	<div class="container">	

		<div class="row header">
			<div class="col-md-4 " style="padding-top: 10px">
				<span style="font-size: 16px;padding-top: 10px; color: white">
				<?= $setting['address']?>	</span>
			</div>
			<div class="col-md-8 pading" style="text-align: right;padding-top: 10px">
				<sapn class="text-warning" style="font-size:18px; ">Hotline:
				<?= $setting['hotline']?>|Thời gian làm việc:7h-12h	</span>
			</div>
			
		</div>
	</div>
</div>
<div class="container">
	<div class="row menu"">
		<div class="col-md-3 col-xs-12 col-sm-4 logo" style="margin-top: -50px;height: 145px;z-index:-10;overflow: hidden;  ">
			<a href="<?= $siteUrl ?>">
				<img src="<?= $siteUrl . $setting['logo']?>" alt="Logo" >
			</a>
		</div>
		<div class="col-sm-9 col-xs-12 col-sm-4 menu-nav" style="margin-top: 20px; font-weight:bold;font-size:16px; z-index: 100">
			<ul class="nav justify-content-end nav">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Trang Chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="introduce.php">Giới Thiệu</a>
				</li>
				<li>
					<a class="nav-link text-primary" >Danh Mục</a>
					<ul class="nav sub-menu">
				   <?php foreach ($cates as $item) :?>
					<li class="nav-item">
						<a href="<?= $siteUrl ?>cate.php?id=<?= 
						$item['id']?>"><?= $item['name'] ?></a>
					</li>
				<?php endforeach?>
					</ul>
				</li>
			
				<li class="nav-item">
					<a class="nav-link " href="contact.php">Liên Hệ</a>
				</li>
			</ul>

		</div>
	</div>

</div>
