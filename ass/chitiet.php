<?php 
require_once './commons/utils.php';
$id = $_GET['id'];
$cateId = $_GET['id'];
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 3;
$offset = ($pageNumber-1)*$pageSize;
//lấy product
$prodcutQuery="select*from products where id=$id";
$stmt=$conn->prepare($prodcutQuery);
$stmt->execute();
$sp=$stmt->fetch();
$cates=$sp['cate_id'];
$view=$sp['views'] + 1 ;

// danh sach binh luan cho san pham
$sql = "select * from comments where product_id = $id AND status=1  order by id desc limit $offset, $pageSize";
$stmt = $conn->prepare($sql);
$stmt->execute();
$comments = $stmt->fetchAll();
$countCommentQuery = "select count(*) as total from comments where  product_id = $id ";
$com= getSimpleQuery($countCommentQuery);
$sql = "select 
c.*,
count(p.id) as total_product
from categories c
join products p
on c.id = p.cate_id 
where c.id = $cateId";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetch();

$top3="select*from products where cate_id=$cates and id!=$id order by views desc limit 3";
$stmt=$conn->prepare($top3);
$stmt->execute();
$pro=$stmt->fetchAll();

$sql="update products set views= $view where id= $id";
$vie=getSimpleQuery($sql);

$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
$pageSize = 8;
$offset = ($pageNumber-1)*$pageSize;
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<?php 
	include './share/header_asset.php';
	?>
	<title>Chi tiết</title>
</head>

<body>
	<?php 
	include './share/header.php';
	?>
	<div id="product">
		<div class="container">
			<div class="tittle-product">
				<h3>Chi tiết sản phẩm</h3>
				<div class="col-sm-5 col-xs-12" >
					<div class="img-height" style="height: 270px">
						<img class="card-img-top" src="<?= $siteUrl . $sp['image']?>" alt="Card image cap">
					</div>
					
					
				</div>
				<div class="col-sm-7 col-xs-12">
					<div class="text">
						<h1 class="text-danger"><?= $sp['product_name']?></h1>

						<del><p class="text-muted"><h4>Giá Cũ:<b><?= $sp['list_price']?>VNĐ</b></h4></del> 
							<h3 class="text-primary">Giá Mới Nhất: <b><?= $sp['sell_price']?> VNĐ</b></h3></p>

							<b>Mô tả:</b>&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     
							  Lượt xem:<?= $sp['views']?><i class="fa fa-eye" aria-hidden="true"></i>
							<br />
							<p>
								<?= $sp['detail'] ?>
							</p>


						</div>



					</div>
				</div>
			</div>
			<div id="hot-product">
				<div class="container">
					<div class="tittle-product">

					</div>
					<div class="row">

						<div class="col-md-5">
							<h3>Đóng góp ý kiến khách hàng</h3>
							<?php foreach ($comments as $item): ?>
								
									<div class="form-group bg-warning"><i class="fa fa-user" aria-hidden="true"></i>
									Email:<?= $item['email']?>
					<div class="form-group  " style="border:1px solid #ccc; height: 50px; background: #ccc"><i class="fa fa-comments" aria-hidden="true"></i>
									Nhận xét:<?= $item['content']?></div>
								</div>
							<?php endforeach ?>
								<br>
						<div class="paginate"></div>
						</div>
					


						<div class="col-md-7">
							<h2>Bình luận</h2>
							<form method="post" action="comment.php" onsubmit="return validateForm()">
								<input type="hidden" name="id" value="<?= $id?>">
								<div class="form-group">
									<label>Email</label>

									<input type="text" name="email" id="email" value="" class="form-control" /> 
									 <span id="spanemail" class="text-danger"></span>
								</div>
								<div class="form-group">
									<label>Nội dung</label>
									<textarea class="form-control" rows="5" name="content" id="password"></textarea>

									<span id="spanconten" class="text-danger"></span>
								</div>
								<div class="text-center">
									<button type="submit" name="login" class="btn btn-sm btn-primary" >Gửi phản hồi</button>
								</div>

							</form>

						</div>	
						<script language="javascript">
							function validateForm()
							{
    // Bước 1: Lấy giá trị của username và password
    var username = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var email=document.getElementById('spanemail');
    var content=document.getElementById('spanconten');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // Bước 2: Kiểm tra dữ liệu hợp lệ hay không

    if (username == ''){
    	email.innerHTML="Nhập email không được để trống email!";
    	//alert('Bạn chưa nhập email');
    }
    else if (password == '')
    {
    	content.innerHTML="Nhập nội dung không được để trống!";
    }
    else if (!filter.test(username)) {
            email.innerHTML="Nhập đúng định dạng email!";
            return false;
        } 
    else{

    	return true;
    }

    return false;
}
</script>


</div>

</div>
</div>

<div class="container">
	<h3>Sản Phẩm Liên Quan</h3>
	<div class="row">

		<?php foreach ($pro as $producttop3) :?> 

			<div class="col-sm-4">
				<div class="card" style="width: 30rem;">
					<a href="<?= $siteUrl?>chitiet.php?id=<?= $producttop3['id']?>"><img class="card-img-top" src="<?= $producttop3['image'] ?>" alt="Card image cap"></a>
					<div class="card-body">
						<h5 class="card-title"><?= $producttop3['product_name'] ?></h5>
						<a href="<?= $siteUrl?>chitiet.php?id=<?= $producttop3['id']?>" class="btn btn-primary">Xem Thêm >></a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
</div>
<?php 
include './share/footer.php';
?>
	<script src="<?=$siteUrl?>plugins/simplePagination/jquery.simplePagination.js"></script>

	<script type="text/javascript">
	 	$(function() {
		    $('.paginate').pagination({
		        items:<?= $com['total']?>,
		        itemsOnPage: <?= $pageSize?>,
		        currentPage: <?= $pageNumber?>,
		        cssStyle: 'light-theme',
		        onPageClick: function(page){
		        	var url = '<?= $siteUrl . 'chitiet.php?id=' . $cateId?>';
					url+= `&page=${page}`;
					window.location.href = url;      
		        }
		    });
		});
	 </script>
	 </body>

</html>

