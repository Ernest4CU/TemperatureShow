<?php
	$temperature_get=$_GET['temperature'];	
	
 	header("Content-type:text/html;charset=utf8");
	if($con = mysqli_connect('localhost','root',''))
	{
		echo "连接成功";
	}else{
		echo "连接失败";
	}
	
	if(mysqli_select_db($con,'tempdata'))
	{
		echo "数据库连接成功";
	}
	else
	{
		echo "数据库连接失败";
	}
	
	$sql = "DELETE FROM temperature where 1";
	mysqli_query($con,$sql);

	date_default_timezone_set("Asia/Shanghai");
	$d=strtotime("now");
	$timeNow = date("Y-m-d H:i:sa",$d);	
	$sql_str='INSERT INTO temperature(time,temperature) VALUES ("'.$timeNow.'","'.$temperature_get.'")';
	if(mysqli_query($con,$sql_str))
	{
		echo "插入成功";
	}else{
		echo "插入失败";
	}
	mysqli_close($con); 
	
	function del($table,$where){
			$sql = "DELETE FROM ".$table." where ".$where;
			$this->query($sql);
	}
?>