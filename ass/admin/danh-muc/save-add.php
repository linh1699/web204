<?php require_once'../../commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location'. $adminUrl .'danh-muc');
		die;
	}
$name=trim($_POST['name']);
$desc=$_POST['descsription'];
//kiem tra xem ten trong ko
if($name=="" ){
	header('location:'.$adminUrl. 'danh-muc/add.php?' .'errName=Vui lòng không để trống');
	die;
}
//if($desc=="" ){
//	header('location:'.$adminUrl. 'danh-muc/add.php?errdesc=Vui lòng không để trống');
//	die;
//}
//kiem tran ten trung hay khong
$sql="select*from categories where name = '$name' ";
$rs=getSimpleQuery($sql);

if($rs != false){
	header('location:'.$adminUrl. 'danh-muc/add.php?errNamedd=Tên danh mục đã tồn tại');
	die;
}

$sql="insert into categories values (null, '$name','$desc')";
getSimpleQuery($sql);
//succes về trang sản phẩm mới về đây
header('location:'.$adminUrl. 'danh-muc?success=true');
die;

 ?>