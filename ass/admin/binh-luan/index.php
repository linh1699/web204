<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 6;
$offset = ($pageNumber-1)*$pageSize;
$commentQuery="select p.*, c.id as catename, c.email AS email, c.content AS content, c.status AS status  from products p JOIN comments c ON p.id = c.product_id ";

$comment=getSimpleQuery($commentQuery,true);

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
                  <tr style="background:#f60 ">
                  <th style="width: 10px">#</th>
                  <th style="width: 150px">Tên Sản Phẩm</th>
                  <th>Image</th>
                  <th>Email</th> 
                  <th style="width: 540px">Conten</th>
                
                  <th style="width: 140px">
                    <a href="javascrip:;"
                      class="btn btn-xs btn-success"
                      >
                      Hành Động
                    </a>
                  </th>
                </tr>
                <?php foreach ($comment as $commen): ?>
                  <tr>
                    <td><?= $commen['catename']?></td>
                    <td><?= $commen['product_name']?></td>
                    <td><img src="<?= $siteUrl. $commen['image']?>" width="100"></td>
                    <td><?= $commen['email']?></td>
                    <td>
                      <?= $commen['content']?>
                    </td>
                


                
                    <td>
                      <a href="<?= $adminUrl?>binh-luan/edit.php?id=<?= $commen['catename']?>"
                      class="btn btn-xs btn-info"
                      >
                        Sửa
                      </a>
                      <a href="javascrip:;"
                      linkurl="<?= $adminUrl?>binh-luan/remove.php?id=<?= $commen['catename']?>"
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
      swal("Good job!", "Tạo bình luận thành công!", "success");
      <?php
    }
   ?>
  $('.btn-remove').on('click', function(){
    swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá bình luận này ?",
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
  <script src="<?=$adminAssetUrl?>simplePagination/jquery.simplePagination.js"></script>

  <script type="text/javascript">
    $(function() {
        $('.paginate').pagination({
            items: <?= $com['total']?>,
            itemsOnPage: <?= $pageSize?>,
            currentPage: <?= $pageNumber?>,
            cssStyle: 'light-theme',
            onPageClick: function(page){
              var url = '<?= $adminUrl?>' . 'binh-luan';
          url+= `&page=${page}`;
          window.location.href = url;      
            }
        });
    });
   </script>
</body>

</html>

</body>
</html>