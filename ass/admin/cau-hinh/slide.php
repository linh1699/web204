<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$slideQuery="select*from slideshows";
$slide=getSimpleQuery($slideQuery,true);

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Danh mục</title>
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
        Slideshow trên website
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th style="width: 15px">Ảnh</th>
                  <th>Ngày tạo</th> 
                  <th style="width: 540px">Url</th>
                  <th>Trạng Thái</th>
                  <th>Số thứ tự</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>cau-hinh/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($slide as $show): ?>
                  <tr>
                    <td><img src="<?= $siteUrl. $show['image']?>" width="150"></td>
                    <td><?= $show['desc']?></td>
                    <td><?= $show['url']?></td>
                    <td><?= $show['status']?></td>
                    <td><?= $show['order_number']?></td>
                    </td>
                    
                    <td>
                      <a href="<?= $adminUrl?>cau-hinh/edit.php?id=<?= $set['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="<?= $adminUrl?>cau-hinh/remove.php?id=<?= $set['id']?>"
                      class="btn btn-xs btn-danger"
                      >
                        Xoá
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
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
</html>