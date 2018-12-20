<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'tai-khoan');
	die;
}
$id = $_POST['id'];
$fullname =trim($_POST['fullname']);
$role = $_POST['role'];
$phone_number=$_POST['phone_number'];
$address =trim($_POST['address']);


$sql = "update users 
		set fullname = :fullname,
			phone_number= :phone_number,
			address = :address,
			role = :role
		where id=:id
		";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':phone_number', $phone_number);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('location: '. $adminUrl . 'tai-khoan');
die;
 ?>