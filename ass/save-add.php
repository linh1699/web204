<?php 
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
	header('location: '.$siteUrl);
	die;
}
 $ten=htmlspecialchars($_POST['name']);
 $sdt=$_POST['phone'];
 $email=htmlspecialchars($_POST['email']);
 $noidung=htmlspecialchars($_POST['conten']);
$address=htmlspecialchars($_POST['address']);
$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
//kiem tra xem ten trong ko
if($ten==""){
	header('location:'.$siteUrl. 'contact.php?errName=Vui lòng không để trống');
	die;
}
//check email
if(!preg_match($partten ,$email, $matchs)){
	header('location:'.$siteUrl. 'contact.php?errNameemail=Email không hợp lệ');
	die;
}
//check tên
if(is_numeric($ten)){
	header('location:'.$siteUrl. 'contact.php?errNamekt=Tên là chữ không nhập ký tự số');
	die;
}
if(strlen($sdt)>12){
	header('location:'.$siteUrl. 'contact.php?errNamesdt=Số điện thoại không phù hợp');
	die;
}else if(strlen($sdt)<9){
	header('location:'.$siteUrl. 'contact.php?errNamesdt=Số điện thoại không phù hợp');
	die;
}


//kiem tran email trung hay khong
$sql="select*from contact where email = '$email' ";
$rs=getSimpleQuery($sql);

if($rs != false){
	header('location:'.$siteUrl. 'contact.php?errEmail=Email đã được đăng ký liên hệ');
	die;
}

$sql="insert into contact values (null,N'$ten','$sdt',N'$email',N'$noidung',N'$address')";
$stmt = $conn->prepare($sql);
$stmt->execute();
header('location: '. $siteUrl. 'contact.php');
die;
 ?>