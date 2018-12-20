<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from categories where id = $cateId";
$cate = getSimpleQuery($sql);
if(!$cate){
  header('location: ' . $adminUrl . 'danh-muc');
  die;
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Dashboard</title>
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
        <small>Sửa danh mục</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sửa danh mục</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <form action="<?= $adminUrl ?>danh-muc/save-edit.php" method="post">
        <input type="hidden" name="id" value="<?= $cate['id'] ?>">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" 
              value="<?= $cate['name'] ?>" 
              class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="form-group">
            <label>Mô tả</label>
     <textarea rows="5" class="form-control" name="description"><?= $cate['desc'] ?></textarea>
          </div>

          <div class="text-right">
            <a href="<?= $adminUrl?>danh-muc" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Lưu</button>
          </div>

        </div>
      </form>


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
    $('[name="descsription"]').wysihtml5();
    var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src ="<?= $siteUrl. $product['image']?>";
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