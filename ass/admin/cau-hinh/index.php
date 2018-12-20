<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$commentQuery="select*from web_settings";
$setting=getSimpleQuery($commentQuery,true);

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
        Cấu hình website
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
                  <tr style="background:#f60 ">
                  <th style="width: 15px">LOGO_WEBSITE</th>
                  <th>HOTLINE</th> 
                  <th style="width: 700px">Địa Chỉ</th>
                  <th>Email</th>
                  <th>Facebook</th>
                  <th style="width: 120px">
                    <a href="javascrip:;"
                      class="btn btn-xs btn-success"
                      >
                      Trạng thái
                    </a>
                  </th>
                </tr>
                <?php foreach ($setting as $set): ?>
                  <tr>
                    <td><img src="<?= $siteUrl. $set['logo']?>" width="100"></td>
                    <td><?= $set['hotline']?></td>
                    <td><?= $set['map']?></td>
                    <td><?= $set['email']?></td>
                    <td><?= $set['fb']?></td>
                    </td>
                    
                    <td>
                      <a href="<?= $adminUrl?>cau-hinh/edit.php?id=<?= $set['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
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