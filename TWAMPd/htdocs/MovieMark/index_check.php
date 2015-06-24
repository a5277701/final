<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理員登入系統檢查</title>
</head>

<?php

include("mysql_connect.inc.php");
$id=$_POST["username"];
$pwd=$_POST["passwd"];

$sql = "SELECT * FROM `member` WHERE `Member_username` = '$id' AND `Member_passwd` = '$pwd'";
$result = mysql_query($sql);


if($sn_index=mysql_num_rows($result)==1)
{
	for($index=0;$index<$sn_index;$index++)
	{
		$arr[$index]=mysql_fetch_array($result);
	}
	echo "登入成功";
	$_SESSION['id']=$id;
	$_SESSION['name']=$arr[0]['Member_name'];
	header("refresh:2; url=Mark.php");
	exit;
}
else
{
	echo "<SCRIPT LANGUAGE='javascript'>";
	echo "alert('登入失敗，請重新登入');";
	echo "history.back();";
	echo "</SCRIPT>";
	exit();
}
mysql_close($link);

?>

<body>
</body>
</html>