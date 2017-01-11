<?php
session_start();
// $_GET['name'] //get 获取
// php 中连接用. 不用+
include 'dbfunction.php';

$username = $_POST['username'] ;
$password = $_POST['password'] ;



$select = "SELECT * FROM user where username = '$username' and password = '$password';";

$data = query($select);
if($data != '[]'){
	
// 存储 session 数据
	
	echo true;
	
	$_SESSION['views'] = $data;
	
}else{
	echo false;
}






//$c = 0;
//
//for ($i = 0; $i < count($jsonData); $i++) {
//	if($jsonData[$i]->username == $username && $jsonData[$i]->password == $password){
//		$c++;
//	}
//}
//
////if($jsonData[1]->username == $username && $jsonData[1]->password == $password){
////		$c++;
////}
//
//if ($c > 0){
//	echo true;
//}else{
//	echo false;
//}


?>


