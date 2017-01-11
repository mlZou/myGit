<?php
	session_start();
	include 'dbfunction.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$id = $_POST['id'];
	$update = " update user set username = '$username' ,password = '$password' ,
	gender = '$gender' where id = '$id';";
	$res = excute($update);
	if($res){
		$select = "SELECT * FROM user where id = '$id';";
		$data = query($select);
		if($data != '[]'){
			
		// 存储 session 数据
			echo $data;
			
			$_SESSION['views']=$data;
			
		}else{
			echo false;
		}
	}else{
		echo false;
	}
	
	/*
	delete from 表名 where 条件
	update 表名 set 字段名 = 新的值 where 条件

	update student set account = 'zgea' where indexid = 89

	delete from 表名 where 条件

	delete from student where indexid = 89
	*/
	
	
?>