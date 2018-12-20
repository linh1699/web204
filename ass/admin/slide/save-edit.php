<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'slide');
	die;
}
$id =$_POST['id'];
$desc=$_POST['desc'];
$url=$_POST['url'];
$status=$_POST['status'];
$order_number=$_POST['order_number'];


$sql = "update slideshows
		set
			desct=:desc,
			url=:url,
			status=:status,
			order_number=:order_number	
		";
$file = $_FILES['image'];

if($file['size'] > 0){
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$filename = "image/slide/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($file['tmp_name'], '../../' . $filename);
	$sql.= ", image = :image";
}
$sql.= " where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':url', $url);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':order_number', $order_number);

$stmt->bindParam(':id', $id);
if($file['size']!=0){
	$stmt->bindParam(':image', $filename);
}
$stmt->execute();
header('location: '. $adminUrl . 'slide');
die;
 ?>