<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Thêm Danh Mục</title>
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
          Thêm Đối Tác

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <form action="<?= $adminUrl ?>doi-tac/save-add.php" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="from-group">
              <label>Tên Đối Tác</label>
              <input type="text" name="name" class="form-control">
              <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }
             ?>
            </div>  
            <div class="from-group">
              <label>Đường dẫn url</label>
              <textarea rows="5" class="form-control" name="url"></textarea>
            </div>
          </div>
     <div class="col-md-6">
      <div class="row">
        <div class="col-md-6 col-md-offset-3"></div>
        <img id="showImage" src="<?= $siteUrl?>image/default/default.jpg" width="300" class="img-responsive"> 
      </div>
      <div class="form-group">
        <label>Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">  
        <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }
             ?> 
        <br>
      </div>
            <div class="text-center">
              <a href="<?= $adminUrl?>doi-tac" class="btn btn-danger btn-xs">Hủy</a>
              <button type="submit" class="btn btn-xs btn-primary">Tạo Mới</button>
            </div>
          </div>

        </form>
      </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once $path.'_share/footer.php'; ?>
  </div>
  <!-- ./wrapper -->


<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('[name="detail"]').wysihtml5();
    var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src ="<?= $siteUrl?>image/default/default.jpg";
      }else{
        getBase64(anh, '#showImage');
      }
    }
    function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
    }
  });
</script>
</body>
</html>