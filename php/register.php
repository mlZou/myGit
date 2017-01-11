<?php
	include 'dbfunction.php';
	//添加语句
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$insert = "INSERT INTO user (username,password,gender)  
		VALUES ('$username', '$password','$gender');"; 
excute($insert);
?>