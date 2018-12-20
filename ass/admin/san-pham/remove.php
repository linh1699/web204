<?php 
require_once '../../commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from products where id = $cateId";
$cate = getSimpleQuery($sql);
// khong tim thay danh muc theo id => trang danh sach danh muc
if(!$cate){
	header("location: " . $adminUrl . "san-pham");
	die;
}
$sql = "delete from products where id = $cateId";
getSimpleQuery($sql);
$sql = "delete from comments where product_id = $cateId";
getSimpleQuery($sql);

header("location: " . $adminUrl . "san-pham");
die;
 ?>