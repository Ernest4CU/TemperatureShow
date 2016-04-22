<?php
	header("Content-type:text/plain;charset=utf8");

	//返回最近的温度值
	getTemperature();

	function getTemperature(){
		
		if($con = mysqli_connect('localhost','root',''))
		{
			//echo "连接成功";
		}else{
			echo "连接失败";
		}
		
		if(mysqli_select_db($con,'tempdata'))
		{
			//echo "数据库连接成功";
		}
		else
		{
			echo "数据库连接失败";
		}
		$sql_str='SELECT * FROM temperature ORDER BY id DESC';
		
		if($res=mysqli_query($con,$sql_str))
		{
			//echo "读取成功";
		}else{
			echo "读取失败";
		}
		$data = mysqli_fetch_assoc($res);
		mysqli_close($con); 
		
		echo $data['temperature'];
	}
?>