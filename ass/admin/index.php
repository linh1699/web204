<?php 

$path="./";
require_once $path.'../commons/utils.php';


$countQueryTour = "select count(*) as total from tours";
$countTour = getSimpleQuery($countQueryTour);
$countThanhPho = "select count(*) as total from thanhpho";
$counttp = getSimpleQuery($countThanhPho);
$countQueryPosts = "select count(*) as total from posts";
$countPosts = getSimpleQuery($countQueryPosts);
$countImg="select count(*) as total from img";
$countIm=getSimpleQuery($countImg);
$countBrand="select count(*) as total from brands";
$countBands=getSimpleQuery($countBrand);
$countUser="select count(*) as total from users";
$countuser=getSimpleQuery($countUser);
$countWestting="select count(*) as total from web_settings";
$countweb=getSimpleQuery($countWestting);

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'_share/style_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'_share/header.php'; ?>
  
  <?php include_once $path.'_share/sidebar.php'; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $countTour['total']?></h3>

              <p>Tour</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>
            <a href="<?= $adminUrl ?>danh-muc" class="small-box-footer">Quản lý <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $counttp['total']?></h3>

              <p>Thanh pho</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="<?= $adminUrl?>san-pham" class="small-box-footer">Quản lý sản phẩm<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countPosts['total'] ?></h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="fa  fa-commenting"></i>
            </div>
            <a href="<?= $adminUrl?>binh-luan" class="small-box-footer">Quản lý comment<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $countIm['total']?></h3>

              <p>Anh</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="<?= $adminUrl?>lien-he" class="small-box-footer">Quản lý liên hệ<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $countBands['total'] ?></h3>

              <p> Đối Tác</p>
            </div>
            <div class="icon">
              <i class="fa  fa-joomla"></i>
            </div>
            <a href="<?= $adminUrl?>doi-tac" class="small-box-footer">Quản lý Đối tác<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $countuser['total'] ?></h3>

              <p> Tài Khoản</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= $adminUrl?>tai-khoan" class="small-box-footer">Quản lý Tài Khoản<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $countweb['total'] ?></h3>

              <p> Cấu Hình</p>
            </div>
            <div class="icon">
              <i class="fa   fa-sun-o"></i>
            </div>
            <a href="<?= $adminUrl?>cau-hinh" class="small-box-footer">Quản lý cấu hình web<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
         <!--  <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $countslide['total'] ?></h3>

              <p> SlideShow</p>
            </div>
            <div class="icon">
              <i class="fa  fa-file-movie-o"></i>
            </div>
            <a href="<?= $adminUrl?>slide" class="small-box-footer">Quản lý slideshows<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/script_assets.php'; ?>
</body>
</html>s