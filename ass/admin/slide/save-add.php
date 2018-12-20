<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'slide');
	die;
}
$desc=$_POST['desc'];
$url = $_POST['url'];
$status= $_POST['status'];

$order_number = $_POST['order_number'];

$file = $_FILES['image'];

$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
// 2. tao filename moi
$filename = "image/slide/" . uniqid() . "." . $ext;
// 3. luu file vao thu muc
// luu file vao thu muc tren server
//1. lay duoi file
// kiem tra xem ten co bi trong hay khong
if(empty($desc) || empty($status) || empty($url)){
	header('location: '. $adminUrl .'slide/add.php?errName=Vui lòng không để trống!');
	die;
}


$id='null';
move_uploaded_file($file['tmp_name'], '../../' . $filename);
$sql = "insert into slideshows values ('null','$filename', N'$desc',N'$url', $status, $order_number)";
$stmt=$conn->prepare($sql);
$stmt->execute();

header('location: '. $adminUrl . 'slide?success=true');
die;
                        
 ?>