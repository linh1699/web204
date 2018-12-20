<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'binh-luan');
	die;
}
$id = $_POST['id'];

$content=$_POST['detail'];
$status = $_POST['status'];


$sql = "update comments
		set
			content = '$content',
			status ='$status'
		where product_id ='$id'";

$stmt =$conn->prepare($sql);

$stmt->execute();

header('location: '. $adminUrl . 'binh-luan');
die;
 ?>