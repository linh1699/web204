<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$sql = "select  
              p.*,
              c.name as catename
        from products p
        join categories c
          on p.cate_id = c.id
        ";
$products = getSimpleQuery($sql, true);
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
                  <th style="width: 10px">#</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th style="width: 100px">Ảnh</th>
                  <th >Giá bán</th>
                  <th >Giá KM</th>
                  <th >Lượt xem</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>san-pham/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($products as $p): ?>
                  <tr>
                    <td><?= $p['id']?></td>
                    <td><?= $p['product_name']?></td>
                    <td>
                      <?= $p['catename']?>
                    </td>
                    <td>
                      <img src="<?= $siteUrl.$p['image'] ?>" width="100">
                    </td>
                    <td>
                      <?= $p['list_price']?>
                    </td>
                    <td>
                      <?= $p['sell_price']?>
                    </td>
                    <td>
                      <?= $p['views']?>
                    </td>
                    <td>
                      <a href="<?= $adminUrl?>san-pham/edit.php?id=<?= $p['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $adminUrl?>san-pham/remove.php?id=<?= $p['id']?>"
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  <?php 
    if(isset($_GET['success']) && $_GET['success'] == true){
      ?>
      swal('Tạo mới sản phẩm thành công!');
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