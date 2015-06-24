<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
	/*echo $_POST["Movie_no"];
	echo $_POST["Movie_time"];
	*/
	$Movie_no=$_POST["Movie_no"];
	$Where_name=$_POST["Movie_time"];
	/*
	echo "<br /> ";
	*/
	
	include("mysql_connect.inc.php");
	
	$sql = "SELECT * FROM `time` WHERE `Movie_no` = '$Movie_no' AND `Where_name` = '$Where_name'";
	
	$result = mysql_query($sql);
	while($time = mysql_fetch_array($result)){
		//echo $time["Time_no"];
		$Time_no=$time["Time_no"];
	}
	echo "<br /> ";
 
 $selectseat=$_POST["selectseat"];
 $num=count($_POST["selectseat"]);
 for ($x=0; $x<$num; $x++)
{
	$sql = "INSERT INTO `mark` (`Movie_no`, `Time_no`, `Seat_no`) VALUES ('$Movie_no', '$Time_no', '$selectseat[$x]');";

	$result = mysql_query($sql);
	//echo "$selectseat[$x]<br />";
}

echo "<SCRIPT LANGUAGE='javascript'>";
		echo "alert('訂票成功');";
		echo "history.back();";
		echo "</SCRIPT>";
		exit();
		
?>
</body>
</html>