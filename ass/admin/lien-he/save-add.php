<?php require_once'../../commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location'. $adminUrl .'lien-he');
		die;
	}
 $ten=trim($_POST['name']);
 $sdt=$_POST['phone'];
 $email=$_POST['email'];
 $noidung=$_POST['conten'];
$address=trim($_POST['address']);
$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";

//kiem tra xem ten trong ko
if(empty($ten) ||empty($sdt) ||empty($email)||empty($noidung)||empty($address)){
	header('location:'.$adminUrl. 'lien-he/add.php?errName=Vui lòng không để trống');
	die;
}
if(is_numeric($ten)){
	header('location:'.$adminUrl. 'lien-he/add.php?errNamekt=Tên là chữ không nhập ký tự số');
	die;
}
if(strlen($sdt)>12){
	header('location:'.$adminUrl. 'lien-he/add.php?errNamesdt=Số điện thoại không phù hợp');
	die;
}else if(strlen($sdt)<9){
	header('location:'.$adminUrl. 'lien-he/add.php?errNamesdt=Số điện thoại không phù hợp');
	die;
}
//check email
if(!preg_match($partten ,$email, $matchs)){
	header('location:'.$adminUrl. 'lien-he/add.php?errNameemail=Email không hợp lệ');
	die;
}
//kiem tran ten trung hay khong
$sql="select*from contact where email = '$email' ";
$rs=getSimpleQuery($sql);

if($rs != false){
	header('location:'.$adminUrl. 'lien-he/add.php?errNamekh=Email khách hàng đã tồn tại');
	die;
}

$sql="insert into contact values (null,N'$ten','$sdt',N'$email',N'$noidung',N'$address')";
getSimpleQuery($sql);
//succes về trang sản phẩm mới về đây
header('location:'.$adminUrl. 'lien-he?success=true');
die;

 ?>