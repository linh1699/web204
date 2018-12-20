<?php 
require_once '../../commons/utils.php';
$product_id = $_GET['id'];
$sql = "select * from comments where id = $product_id";
$cate = getSimpleQuery($sql);


// khong tim thay danh muc theo id => trang danh sach danh muc
if(!$cate){
	header("location: " . $adminUrl . "binh-luan");
	die;
}
$sql = "delete from comments where id =$product_id ";
getSimpleQuery($sql);

/*
$sql = "delete from categories where id = $cateId";
getSimpleQuery($sql);*/
header("location: " . $adminUrl . "binh-luan");
die;
 ?>