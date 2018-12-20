<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$contactQuery="select*from contact";
$contact=getSimpleQuery($contactQuery,true);
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <th style="width: ">Họ Và Tên Khách</th>
                  <th style="width: ">Số Điện Thoại</th>
                  <th>Email</th> 
                  <th style="width: 540px">Nội Dung</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>lien-he/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($contact as $lh): ?>
                  <tr>
                    <td><?= $lh['name']?></td>
                    <td><?= $lh['phone']?></td>
                    <td><?= $lh['email']?></td>
                    <td>
                      <?= $lh['conten']?>
                    </td>
                    
                    <td>
                      <a href="<?= $adminUrl?>lien-he/edit.php?id=<?= $lh['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Trả lời
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $adminUrl?>lien-he/remove.php?id=<?= $lh['id']?>"
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
      swal("Good job!", "Tạo Danh mục thành công!", "success");
      <?php
    }
   ?>
  $('.btn-remove').on('click', function(){
    swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá danh mục này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = $(this).attr('linkurl');
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