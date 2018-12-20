<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm tài khoản</title>
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
        Thêm tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= $adminUrl ?>tai-khoan/save-add.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
             <?php 
              if(isset($_GET['errMail'])){
                ?>
                <span class="text-danger"><?= $_GET['errMail'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Tên đầy đủ</label>
            <input type="text" name="fullname" class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
             <?php 
              if(isset($_GET['errfullname'])){
                ?>
                <span class="text-danger"><?= $_GET['errfullname'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
             <?php 
              if(isset($_GET['errpass'])){
                ?>
                <span class="text-danger"><?= $_GET['errpass'] ?></span>
                <?php
              }
             ?>
             <?php 
              if(isset($_GET['errpasstring'])){
                ?>
                <span class="text-danger"><?= $_GET['errpasstring'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="cfpassword" class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
             <?php 
              if(isset($_GET['errpass'])){
                ?>
                <span class="text-danger"><?= $_GET['errpass'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Phân quyền</label>
            <select name="role" class="form-control">
              <?php foreach (USER_ROLES as $key => $value): ?>
                <option value="<?= $value ?>"><?= $key ?></option>
              <?php endforeach ?>
            </select>
             <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
          </div>
        </div>
           <div class="col-md-6">
        <div class="form-group">
          <label>Số Điện Thoại</label>
          <input type="number" name="phone_number" class="form-control">
           <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
    <?php 
    if (isset($_GET['errphone'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errphone'] ?></span>
   <?php }
   ?>
        </div>
        <div class="col-md-12">
    <div class="from-group">
    <label>Địa Chỉ</label>
    <textarea rows="10" class="form-control" name="address"></textarea>
    <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
 </div>
</div><br>
          <div class="text-center"><br>
            <a href="<?= $adminUrl?>tai-khoan" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>
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

<!-- ./wrapper -->
<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('[name="address"]').wysihtml5();
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