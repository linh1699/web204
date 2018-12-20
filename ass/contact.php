<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liên Hệ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	include'share/header_asset.php' ?>
</head>
<style type="text/css">
  .lh a:hover{color: red; font-size:18px; font-weight: 900;}
</style>
<body>	
	<?php include'./share/header.php'; ?>

<hr style="margin-top:4px; border-radius:2px"/>

</section>
       <center> <h1 class="gt">* Liên Hệ *</h1></center><br>
	
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 intro">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3149.2811587187157!2d106.08351035675663!3d20.169580657119553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136721485e620f1%3A0x88a38bab14e40e70!2zxJBp4buDbSDEkeG6v24gTUlP!5e0!3m2!1svi!2s!4v1536841939440" width="500" height="400"  frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
	<div id="q2" class="col-6 col-md-6 product">
		<form method="post" action="save-add.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Họ Và Tên</label>
    <input type="text" name="name" class="form-control" 
    id="exampleFormControlInput1" value="<?php ?>" >
    <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }?>
            <?php 
                if (isset($_GET['errNamekt'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errNamekt'] ?></span>
            <?php }?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Số Điện Thoại</label>
    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" >
       <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }?>
            <?php 
                if (isset($_GET['errNamesdt'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errNamesdt'] ?></span>
            <?php }?>
            <?php 
                if (isset($_GET['errNametest'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errNametest'] ?></span>
            <?php }?>

  </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com">
       <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }?>
     <?php 
                if (isset($_GET['errNameemail'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errNameemail'] ?></span>
            <?php }
             ?>
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" >
       <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }?>
  </div>
   

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Nội Dung</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="conten"></textarea>
       <?php 
                if (isset($_GET['errName'])){
               ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
            <?php }?>
  </div>

  <button type="submit" class="btn btn-primary">Gửi</button>
</form>
		

</div>
</div>
</div>


<?php include './share/footer.php'; ?>