<?php 
require_once '../../commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from brands where id = $cateId";
$cate = getSimpleQuery($sql);
// khong tim thay danh muc theo id => trang danh sach danh muc
if(!$cate){
	header("location: " . $adminUrl . "doi-tac");
	die;
}
$sql = "delete from brands where id = $cateId";
getSimpleQuery($sql);

header("location: " . $adminUrl . "doi-tac");
die;
 ?>