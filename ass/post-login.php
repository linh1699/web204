<?php 
session_start();
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $siteUrl. 'login.php');
	die;
}
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * 
		from users 
		where email = '$email'";
$user = getSimpleQuery($sql);
if(!$user 
	|| password_verify($password, $user['password']) == false){
	header('location: '. $siteUrl. 'login.php?msg=Email/mật khẩu không đúng!');			
	die;
}
$_SESSION['login'] = $user;
 ?>


 <h2>Đăng nhập thành công!</h2>

 <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = '<?= $adminUrl ?>';
 	}, 2000);
 </script>