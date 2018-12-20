<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'san-pham');
	die;
}
$product_name=trim($_POST['product_name']);
$cate_id = $_POST['cate_id'];
$list_price = $_POST['list_price'];
$sell_price = $_POST['sell_price'];
$detail =trim($_POST['detail']);
$status = $_POST['status'];
$file = $_FILES['image'];

$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
// 2. tao filename moi
$filename = "image/san-pham/" . uniqid() . "." . $ext;
//kiem tra xem ten trong ko
if(empty($product_name)){
	header('location:'.$adminUrl. 'san-pham/add.php?errName=Vui lòng không để trống');
	die;
}
//kiem tran ten trung hay khong
$sql="select*from products where product_name = '$product_name' ";
$rs=getSimpleQuery($sql);
if($rs != false){
	header('location:'.$adminUrl. 'san-pham/add.php?errNamesp=Tên sản phẩm đã tồn tại');
	die;
}
//kiem tra giá
$so=$sell_price-$list_price;
if ($so>=0) {
	header('location:'.$adminUrl. 'san-pham/add.php?errNamegia=sell_price không được lớn hơn list_price');
	die;
}


move_uploaded_file($file['tmp_name'], '../../' . $filename);
$sql = "insert into products
			(product_name, 
			detail,
			image,
			sell_price,
			list_price, 
			status,
			cate_id
			) 
		values 
			(:product_name, 
			:detail, 
			:image,
			:sell_price,
			:list_price,
			:status,
			:cate_id
		)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':product_name', $product_name);
$stmt->bindParam(':detail', $detail);
$stmt->bindParam(':image', $filename);
$stmt->bindParam(':sell_price', $sell_price);
$stmt->bindParam(':list_price', $list_price);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':cate_id', $cate_id);
$stmt->execute();
header('location: '. $adminUrl . 'san-pham?success=true');
die;
                        
 ?>