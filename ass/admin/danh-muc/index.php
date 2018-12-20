<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';

$listCateQuery = "select 
                    c.*,
                    (select count(*) from products where cate_id=
                    c.id) as total_product
                    from categories c";
$cates = getSimpleQuery($listCateQuery, true);

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
        Danh Mục
      </h1>
     
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
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Sản phẩm</th>
                  <th style="width: 240px">Mô tả</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>danh-muc/add.php"
                      class="btn btn-xs btn-success"
                      >
                      Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach ($cates as $c): ?>
                  <tr>
                    <td><?= $c['id']?></td>
                    <td><?= $c['name']?></td>
                    <td>
                      <?= $c['total_product']?>
                    </td>
                    <td>
                      <?= $c['desc']?>
                    </td>
                    <td>
                      <a href="<?= $adminUrl?>danh-muc/edit.php?id=<?= $c['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $adminUrl?>danh-muc/remove.php?id=<?= $c['id']?>"
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
      } else{
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