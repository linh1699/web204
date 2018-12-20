<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];

$sql = "select*from comments join products ON comments.product_id=products.id
 where comments.id=$cateId
";
$product = getSimpleQuery($sql);

if(!$product){
  header('location: ' . $adminUrl . 'binh-luan');
  die;
}
$categoriesQuery="select*from categories";
$cate=getSimpleQuery($categoriesQuery,true);

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
          Sửa Bình Luận

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="<?= $adminUrl ?>binh-luan/save-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product['id']?>"> 
            <div class="col-md-6">  
             <div class="form-group">
              <label>Tên Sản Phẩm</label>
              <input type="text" name="product_name" readonly class="form-control" value="<?= $product['product_name']?>">
              <?php 
              if (isset($_GET['errName'])){
               ?>
               <span class="text-danger"><?php echo $_GET['errName'] ?></span>

             <?php }
             ?>
           </div>
           <img id="showImage" name="image" src="<?= $siteUrl . $product['image']?>" width="300" class="img-responsive"> <br>
             <div class="form-group">
        <label>Ảnh sản phẩm</label>
      </div>
           <div class="form-group">
              <label>Trạng thái</label>
              <br>
              <input type="radio"
                <?php if ($product['status'] == 1): ?>
                  checked
                <?php endif ?>
               name="status" value="1"> Active &nbsp;
              <input type="radio" 
                <?php if ($product['status'] != 1): ?>
                  checked
                <?php endif ?>
                name="status" value="-1"> Inactive
            </div>
        
     </div>
   
      <div class="row">
        <div class="col-md-6 col-md-offset-3"></div>
        
      </div>

     
   
    <div class="col-md-12">
    <div class="from-group">
    <label>Bình Luận</label>
    <textarea rows="10" class="form-control" readonly name="detail"><?= $product['content']?></textarea>
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
  <button type="submit" class="btn btn-xs btn-primary" name="submit">Sửa</button>
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