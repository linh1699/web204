<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'tai-khoan');
	die;
}
$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];
$role = $_POST['role'];

$passwords = password_hash($password, PASSWORD_DEFAULT);

$phone_number=$_POST['phone_number'];
$address=trim($_POST['address']);
$partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
$mail = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
//kiem tra trong
if(empty($email) || empty($fullname) || empty($password)|| empty($cfpassword)|| empty($role)
	||empty($phone_number)|| empty($address)){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errName=Vui lòng không để trống');
	die;
}
//kiem tra dang mat khau
if(!preg_match($partten ,$password, $matchs)){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errpass=Mật khẩu gồm chữ in hoa và số dài hơn 6 kí tự');
	die;
}
//kiem tra dang email
if(!preg_match($mail ,$email, $matchs)){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errMail=Email đã được tạo tài khoản, vui lòng chọn email hợp lệ!');
	die;
}
//kiemtra ten
if(is_numeric($fullname)){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errfullname=Tên là chữ không nhập ký tự số');
	die;
}
if(strlen($phone_number)>12){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errphone=Số điện thoại không phù hợp');
	die;
}else if(strlen($phone_number)<9){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errphone=Số điện thoại không phù hợp');
	die;
}


//kiem tran ten trung hay khong
$sql="select*from users where fullname = '$fullname' and email= '$email' ";
$rs=getSimpleQuery($sql);
if($rs != false){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errNamesp=Tên tài khoản đã tồn tại');
	die;
}
//so sanh pass
if($password!= $cfpassword){
	header('location:'.$adminUrl. 'tai-khoan/add.php?errpass=Mật khẩu không trùng khớp');
	die;
}
$sql = "insert into users 
			(email, fullname, password, role,address,phone_number)
		values 
			('$email', '$fullname', '$passwords', '$role','$address','$phone_number')";
getSimpleQuery($sql);
header('location: '. $adminUrl . 'tai-khoan?success=true');
die;
 ?>