<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'danh-muc');
	die;
}
$id = $_POST['id'];
$name = trim($_POST['name']);
$description = $_POST['description'];

// kiem tra xem ten co bi trong hay khong
if($name == ""){
	header('location: '. $adminUrl .'danh-muc/edit.php?id='.$id.'&errName=Vui lòng không để trống tên danh mục');
	die;
}
// Kiem tra ten co bi trung hay khong
$sql = "select * 
		from categories 
		where name = '$name'
			and id != $id
";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $adminUrl .'danh-muc/edit.php?id='.$id.'&errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
	die;
}
$sql = "update categories
		set
			name = :name,
			descsription =:description
		where id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('location: '. $adminUrl . 'danh-muc');
die;
 ?>