<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'lien-he');
	die;
}
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$conten = $_POST['conten'];

//
$sql="select*from contact where email = '$email' ";
$rs=getSimpleQuery($sql);

if($rs != false){
	header('location:'.$adminUrl. 'lien-he/add.php?errNamekh=Email khách hàng đã tồn tại');
	die;
}	
$sql = "update contact 
		set name = :name,
			phone= :phone,
			email = :email,
			address = :address,
			conten = :conten
		where id=:id
		";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':conten', $conten);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('location: '. $adminUrl . 'lien-he');
die;
 ?>