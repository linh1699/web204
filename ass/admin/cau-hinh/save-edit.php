<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'cau-hinh');
	die;
}
$id=$_POST['id'];
$hotline=$_POST['hotline'];
$email=$_POST['email'];
$map=$_POST['map'];
$fb=$_POST['fb'];


$sql = "update web_settings 
		set
			hotline =:hotline,
			email= :email, 
			map=:map,
			fb=:fb	
		";
$file = $_FILES['image'];
if($file['size'] > 0){
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$filename = "image/slide/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($file['tmp_name'], '../../' . $filename);
	$sql.= ", logo = :image";
}
$sql.= " where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':hotline', $hotline);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':fb', $fb);
$stmt->bindParam(':map', $map);

$stmt->bindParam(':id', $id);
if($file['size']!=0){
	$stmt->bindParam(':image', $filename);
}
$stmt->execute();
header('location: '. $adminUrl . 'cau-hinh');
die;
 ?>