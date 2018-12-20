<?php 
session_start();
require_once './commons/utils.php';
unset($_SESSION['login']);
header('location: '. $siteUrl . 'login.php');
 ?>