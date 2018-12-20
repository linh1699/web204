<?php 
$host="localhost";
$dbname="travel";

$conn=new PDO ("mysql:host=$host; dbname=$dbname; charset=utf8","root","");
// hàm define tạo hằng số tên hằng-giá trị hằng
// define('TABLE_BRANDS','brands');
// define('TABLE_WEBSETTING','web_settings');
// define('TABLE_SLIDERSHOW','slideshows');
// define('TABLE_CATEGORY','categories');
// define('TABLE_PRODUCT','products');
$siteUrl= "http://localhost:8080/ass/";
$adminAssetUrl= "http://localhost:8080/ass/admin/adminlte/";
$adminUrl= "http://localhost:8080/ass/admin/";
function getSimpleQuery($sql, $isAll=false){
	/*bien goi ngoai ham */
	global $conn;
$stmt=$conn->prepare($sql);
$stmt->execute();
if($isAll){
	return $stmt->fetchAll();
}
return $stmt->fetch();

}

function dd($vari){
	echo "<pre>";
	var_dump($vari);
	die;
}

const USER_ROLES = [
	""=>0,
	"admin" => 500,
	"moderator" => 300,
	"member" => 1
];
const ACTIVE = [
	"Hiện" => 1,
	"Ẩn" => -1,

];

 ?>
	