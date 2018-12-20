<?php 
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] == "GET"){
	header('location: '.$siteUrl);
	die;
}
$productId = $_POST['id'];

$email =htmlspecialchars($_POST['email']);
$content =htmlspecialchars($_POST['content']);
$status=1;

$sql = "insert into comments
			(email, content, product_id,status)
		values
			(N'$email', N'$content', $productId,$status)";
$stmt = $conn->prepare($sql);
$stmt->execute();
header('location: '. $siteUrl. 'chitiet.php?id='.$productId);
die;
 ?>
