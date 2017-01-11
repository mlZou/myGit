<?php 

//数据库连接
function connect(){
	// 假定数据库用户名：root，密码：root，数据库：register 
	$servername = 'localhost';
	$user = 'root';
	$psword = 'root';
	$dbname = 'data';
	
	$conn = new mysqli($servername,$user,$psword,$dbname);
	
	if (mysqli_connect_error($conn)) 
    { 
        echo "连接 MySQL 失败: " . mysqli_connect_error();
        return null;
    }
	return $conn;
}


// 执行查询( SELECT、SHOW、DESCRIBE 或 EXPLAIN )
function query($sql){
	//打开数据库连接
	$conn = connect();
	//执行sql脚本，并返回一个结果集
	$res = mysqli_query($conn,$sql);
	if($res){
		//定义一个数组用来储存数据
		$jsonData = array();
		//在结果集中获取对象(逐行获取)
		while($obj = mysqli_fetch_object($res))
		{
		//把每行数据分别当作一个对象，逐个压入数组中
			$jsonData[] = $obj;
		}
		//把数组以json形式打印出来
		$data = json_encode($jsonData,JSON_UNESCAPED_UNICODE);	
		//释放结果集
		mysqli_free_result($res);
	}
	//关闭数据库连接
	mysqli_close($conn);
	return $data;
}


//执行逻辑语句(ture|false)
function excute($sql){
	$conn = connect();
	//执行sql脚本，并返回一个结果集
	$res = mysqli_query($conn,$sql);
	
	
	mysqli_close($conn);
	return $res;
}



//添加语句
//$username = $_POST['username'];
//$nickname = $_POST['nickname'];
//$password = $_POST['password'];
//$gender = $_POST['gender'];
//$sql = "INSERT INTO login (username,nickname,password,gender)  
//		VALUES ('$username', '$nickname','$password','$gender');"; 
//add($sql);

//查询语句
//$sql = "SELECT * FROM login;";
//select($sql);

?>
