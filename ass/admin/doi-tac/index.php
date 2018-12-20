<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$commentQuery="select*from brands";
$stmt=$conn->prepare($commentQuery);
$stmt->execute();
$brand=$stmt->fetchAll();

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
        Đối tác kinh doanh
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
                  
                  <th style="">Tên Đối Tác</th>
                  <th>LOGO</th> 
                  <th style="width: 540px">Url</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>doi-tac/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($brand as $commen): ?>
                  <tr>
                    
                    <td><?= $commen['name']?></td>
                    <td><img src="<?= $siteUrl. $commen['image']?>" width="100"></td>
                    <td>
                      <?= $commen['url']?>
                    </td>
                    
                    <td>
                      <a href="<?= $adminUrl?>doi-tac/edit.php?id=<?= $commen['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="javascrip:;"
                      linkurl="<?= $adminUrl?>doi-tac/remove.php?id=<?= $commen['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
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
<script src="../_share/sweetalert.min.js"></script>
<script type="text/javascript">
  <?php 
    if(isset($_GET['success']) && $_GET['success'] == true){
      ?>
      swal("Good job!", "Tạo đối tác thành công!", "success");
      <?php
    }
   ?>
  $('.btn-remove').on('click', function(){
    swal({
      title: "Lưu ý!",
      text: "Bạn có chắc chắn muốn xoá Đối tác này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Đã xóa thành công đối tác!", {
      icon: "success",
    });
        window.location.href = $(this).attr('linkurl');
      }
      else{
         swal("Cảm ơn bạn!");
         
      }
    });
    // var conf = confirm('Bạn có xác nhận muốn xoá danh này hay không?');
    // if(conf){
    //   window.location.href = $(this).attr('linkurl');
    // }
  });
</script>
</body>
</html>