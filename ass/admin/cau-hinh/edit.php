<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$id = $_GET['id'];

$sql = "select * from web_settings where id= $id";
$websetting= getSimpleQuery($sql);

if(!$websetting){
  header('location: ' . $adminUrl . 'cau-hinh');
  die;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Sửa Sản Phẩm</title>
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
          Sửa CẤU HÌNH

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

    <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="<?= $adminUrl ?>cau-hinh/save-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id">
            <div class="col-md-6">
             
         <div class="from-group">
    <label>Map</label>
    <textarea rows="10" class="form-control" name="map" ><?= $websetting['map']?></textarea>
    <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
 </div>
 <div class="from-group">
    <label>Facebook</label>
    <textarea rows="10" class="form-control" name="fb"><?= $websetting['fb']?></textarea>
    <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
 </div>
         
     </div>
     <div class="col-md-6">
      <div class="row">
        <input type="hidden" name="id" value="<?= $websetting['id']?>">
        <div class="form-group">
              <label>HOTLINE</label>
              <input type="text" name="hotline" class="form-control" value="<?= $websetting['hotline']?>">
             
           </div>
           <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?= $websetting['email']?>">     
         </div>
         <br>
        <div class="col-md-6 col-md-offset-3"></div>
        <img id="showImage" src="<?= $siteUrl . $websetting['logo']?>" width="300" class="img-responsive"> 

      </div>
      <div class="form-group">
        <label>Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">   
      </div>
      
    </div>
 
<div class="text-center">
  <a href="<?= $adminUrl?>cau-hinh" class="btn btn-danger btn-xs">Hủy</a>
  <button type="submit" class="btn btn-xs btn-primary" name="submit">Sửa Mới</button>
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
        document.querySelector('#showImage').src ="<?= $siteUrl . $websetting['logo']?>";
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