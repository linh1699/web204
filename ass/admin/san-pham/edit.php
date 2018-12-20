<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];

$sql = "select p.*, c.name as catename from products p JOIN categories c ON p.cate_id = c.id where p.id=$cateId";
$product = getSimpleQuery($sql);

if(!$product){
  header('location: ' . $adminUrl . 'san-pham');
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
          Sửa Sản Phẩm

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="<?= $adminUrl ?>san-pham/save-edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $cateId?>"> 
            <div class="col-md-6">
              <div class="from-group">
                <label>Tên Danh mục</label>
                 <select name="cate_id" class="form-control">
                <?php foreach ($cate as $item): ?>
                  <option 
                      <?php if ($item['id'] === $product['cate_id']): ?>
                        selected
                      <?php endif ?>
                      value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php endforeach ?>
              </select>
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
              <label>Tên Sản Phẩm</label>
              <input type="text" name="product_name" class="form-control" value="<?= $product['product_name']?>">
              <?php 
              if (isset($_GET['errName'])){
               ?>
               <span class="text-danger"><?php echo $_GET['errName'] ?></span>

             <?php }
             ?>
           </div>
           <div class="form-group">
            <label>List_price</label>
            <input type="number" name="list_price" class="form-control" value="<?= $product['list_price']?>"> 
            <?php 
            if (isset($_GET['errName'])){
             ?>
             <span class="text-danger"><?php echo $_GET['errName'] ?></span>
           <?php }
           ?>
         </div>
         <div class="form-group">
          <label>Sell_price</label>
          <input type="number" name="sell_price" class="form-control" value="<?= $product['sell_price']?>">
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
        <img id="showImage"  src="<?= $siteUrl . $product['image']?>" width="300" class="img-responsive"> 
      </div>
      <div class="form-group">
        <label>Ảnh sản phẩm</label>
        <input type="file" name="image" class="form-control">   
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
   
    <div class="col-md-12">
    <div class="from-group">
    <label>Mô tả</label>
    <textarea rows="10" class="form-control" name="detail"><?= $product['detail']?></textarea>
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