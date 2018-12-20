<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $adminUrl .'doi-tac');
	die;
}
$name=$_POST['name'];
$url = $_POST['url'];
$file = $_FILES['image'];

$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
// 2. tao filename moi
$filename = "image/doi-tac/" . uniqid() . "." . $ext;
// 3. luu file vao thu muc
// luu file vao thu muc tren server
//1. lay duoi file
// kiem tra xem ten co bi trong hay khong
if(empty($name)|| empty($url) || empty($file) ){
	header('location: '. $adminUrl .'doi-tac/add.php?errName=Vui lòng không để trống');
	die;
}
// // Kiem tra ten co bi trung hay khong
 $sql = "select * from brands where name = '$name'";
 $rs = getSimpleQuery($sql);
 if($rs != false){
	header('location: '. $adminUrl .'doi-tac/add.php?errName=Tên đối tác đã tồn tại, vui lòng chọn tên khác'); 	die;
 }


move_uploaded_file($file['tmp_name'], '../../' . $filename);
$sql = "insert into brands
			(name, 
			image,
			url
			
			
			) 
		values 
			(:name, 
			:image,
			:url
			
			
		)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':url', $url);
$stmt->bindParam(':image', $filename);
$stmt->execute();

header('location: '. $adminUrl . 'doi-tac?success=true');
die;
                        
 ?>