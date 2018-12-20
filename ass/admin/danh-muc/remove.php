<?php 
require_once '../../commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from categories where id = $cateId";
$cate = getSimpleQuery($sql);
// khong tim thay danh muc theo id => trang danh sach danh muc
if(!$cate){
	header("location: " . $adminUrl . "danh-muc");
	die;
}
$sql = "delete from products where cate_id = $cateId";
getSimpleQuery($sql);
$sql = "delete from categories where id = $cateId";
getSimpleQuery($sql);
header("location: " . $adminUrl . "danh-muc");
die;
 ?>