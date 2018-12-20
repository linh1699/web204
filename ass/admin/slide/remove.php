<?php 
require_once '../../commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from slideshows";
$cate = getSimpleQuery($sql);
// khong tim thay danh muc theo id => trang danh sach danh muc
if(!$cate){
	header("location: " . $adminUrl . "slide");
	die;
}
$sql = "delete from slideshows where id = $cateId";
getSimpleQuery($sql);

header("location: " . $adminUrl . "slide");
die;
 ?>