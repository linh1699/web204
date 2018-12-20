<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'san-pham');
	die;
}
$id = $_POST['id'];
$name = $_POST['name'];
$url = $_POST['url'];

$sql = "update brands 
		set name = :name,
			url = :url
			
		";
$file = $_FILES['image'];


if($file['size'] > 0){
	$path = $file['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$filename = "image/doi-tac/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($file['tmp_name'], '../../' . $filename);
	$sql .= ", image = :image";
}
$sql .= " where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':url', $url);
$stmt->bindParam(':id', $id);
if($file['size']!=0){
	$stmt->bindParam(':image', $filename);
}
$stmt->execute();
header('location: '. $adminUrl . 'doi-tac');
die;
 ?>