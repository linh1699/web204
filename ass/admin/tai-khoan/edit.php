<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$id = $_GET['id'];

$sql = "select * from users where id=$id";
$user = getSimpleQuery($sql);

if(!$user){
  header('location: ' . $adminUrl . 'tai-khoan');
  die;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Sửa Tài Khoản</title>
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
          Sửa Tài Khoản

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <!-- Main content -->
    <section class="content">
      <form action="<?= $adminUrl ?>tai-khoan/save-edit.php" method="post">
        <div class="col-md-6">
          <input type="hidden" name="id" value="<?= $user['id']?>">
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" readonly value="<?= $user['email']?>">
            <?php 
              if(isset($_GET['errEmail'])){
                ?>
                <span class="text-danger"><?= $_GET['errEmail'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Tên đầy đủ</label>
            <input type="text" name="fullname" class="form-control" value="<?= $user['fullname']?>">
            <?php 
              if(isset($_GET['errFullname'])){
                ?>
                <span class="text-danger"><?= $_GET['errFullname'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" readonly class="form-control" value="<?= $user['password']?>">
            <?php 
              if(isset($_GET['errPassword'])){
                ?>
                <span class="text-danger"><?= $_GET['errPassword'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="cfpassword" readonly="" class="form-control" >
            <?php 
              if(isset($_GET['errcfPassword'])){
                ?>
                <span class="text-danger"><?= $_GET['errcfPassword'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Phân quyền</label>
            <select name="role" class="form-control">
              <option value="500">Admin</option>
              <option value="300">Moderator</option>
              <option value="1">Member</option>
            
            </select>
          </div>
        </div>
           <div class="col-md-6">
        <div class="form-group">
          <label>Số Điện Thoại</label>
          <input type="number" name="phone_number" class="form-control" value="<?= $user['phone_number']?>">
        </div>
        <div class="col-md-12">
    <div class="from-group">
    <label>Địa Chỉ</label>
    <textarea rows="10" class="form-control" name="address"><?= $user['address']?></textarea>
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
            <button type="submit" class="btn btn-xs btn-primary">Sửa mới</button>
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