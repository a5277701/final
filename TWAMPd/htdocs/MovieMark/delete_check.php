<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>del</title>
</head>

<body>
<?php
	//echo $_GET["del"];
	$Mark_no=$_GET["del"];
	include("mysql_connect.inc.php");
	$sql="DELETE  FROM `mark` WHERE Mark_no='$Mark_no'";
	$mn=mysql_query($sql);
	
	echo "<form action='delete_check.php' method='post'>
<table border='2'>  
<tr>
	<th>訂票流水號</th>
    <th>電影編號</th>
    <th>時間編號</th>
     <th>座位編號</th>
      <th></th>
</tr>";

	include("mysql_connect.inc.php");
	$sql="select * from mark";
	$mn=mysql_query($sql);
	while($a=mysql_fetch_array($mn)){ 
		echo "<tr>";
		echo "<td>".$a["Mark_no"]."</td>";
		echo "<td>".$a["Movie_no"]."</td>";
		echo "<td>".$a["Time_no"]."</td>";
		echo "<td>".$a["Seat_no"]."</td>";	
		echo "<td><input id='".$a["Mark_no"]."' type='button' onclick='del(this.id);' value='刪除'/></td>";	
		echo "</tr>";
	}
			

echo "</table>
</form>"
?>
</body>
</html>