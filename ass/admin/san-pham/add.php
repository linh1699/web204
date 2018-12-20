<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$sql="select*from categories";
$cate=getSimpleQuery($sql,true);
$sql="select*from products";
$product=getSimpleQuery($sql,true);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Thêm Sản Phẩm</title>
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
          Thêm Sản Phẩm

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="<?= $adminUrl ?>san-pham/save-add.php" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="from-group">
                <label>Tên Danh mục</label>
                <br>
                <select name="cate_id" class="form-control">
                  <option value="">Lựa chọn danh mục</option>
                  <?php foreach ($cate as $dm) :?>       
                    <option value="<?= $dm['id'] ?>"><?= $dm['name']?></option>
                  <?php endforeach ?>
                </select>
                <?php 
                if (isset($_GET['errName'])){
                 ?>
                 <span class="text-danger"><?php echo $_GET['errName'] ?></span>
               <?php }
               ?>
             </div>
             <div class="form-group">
              <label>Tên Sản Phẩm</label>
              <input type="text" name="product_name" class="form-control">
              <?php 
              if (isset($_GET['errName'])){
               ?>
               <span class="text-danger"><?php echo $_GET['errName'] ?></span>

             <?php }
             ?>
             <?php 
              if (isset($_GET['errNamesp'])){
               ?>
               <span class="text-danger"><?php echo $_GET['errNamesp'] ?></span>

             <?php }
             ?>
           </div>
           <div class="form-group">
            <label>List_price</label>
            <input type="number" name="list_price" class="form-control"> 
            <?php 
            if (isset($_GET['errName'])){
             ?>
             <span class="text-danger"><?php echo $_GET['errName'] ?></span>
           <?php }
           ?>
         </div>
         <div class="form-group">
          <label>Sell_price</label>
          <input type="number" name="sell_price" class="form-control">
          <?php 
          if (isset($_GET['errName'])){
           ?>
           <span class="text-danger"><?php echo $_GET['errName'] ?></span>
         <?php }
         ?> 
         <?php 
          if (isset($_GET['errNamegia'])){
           ?>
           <span class="text-danger"><?php echo $_GET['errNamegia'] ?></span>
         <?php }
         ?> 
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
      </div>
      <div class="form-group">
        <label>Trạng Thái</label><br>
        <input type="radio"  name="status" value="1">Active
        <input type="radio"  name="status" value="-1">InActive
        <?php 
          if (isset($_GET['errName'])){
           ?>
           <span class="text-danger"><?php echo $_GET['errName'] ?></span>
         <?php }
         ?> 
        </select> 
      </div>
    </div>
    <div class="col-md-12">
    <div class="from-group">
    <label>Mô tả</label>
    <textarea rows="10" class="form-control" name="detail"></textarea>
    <?php 
    if (isset($_GET['errName'])){
     ?>
     <span class="text-danger"><?php echo $_GET['errName'] ?></span>
   <?php }
   ?>
 </div>
</div>
</div>
<div class="text-center">
  <a href="<?= $adminUrl?>san-pham" class="btn btn-danger btn-xs">Hủy</a>
  <button type="submit" class="btn btn-xs btn-primary" name="submit">Tạo Mới</button>
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