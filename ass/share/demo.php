
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= $siteUrl?>plugins\simplePagination/simplePagination.css">
  <script src="plugins/bootstrap/jquery/js/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery.min.js"></script>
  <script src="css/bootstrap-3/js/bootstrap.min.js"></script>
  <script src="<?=$siteUrl?>plugins/simplePagination/jquery.simplePagination.js"></script>


</head>
<div class="container">
<div class="row">
 <div class="col-md-4">
  <h2>HTML Forms</h2>

<form ">
  First name:<br>
  <input type="text" name="firstname" value="">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="">
  <br><br>
  <input type="submit" value="Submit" class="btn-remove">
</form> 
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $('.btn-remove').on('click', function(){
    swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá danh mục này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = $(this).attr('linkurl');
      }
    });
    // var conf = confirm('Bạn có xác nhận muốn xoá danh này hay không?');
    // if(conf){
    //   window.location.href = $(this).attr('linkurl');
    // }
  });
</script>
</script>
</body>
</html>