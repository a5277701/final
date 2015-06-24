<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>



</head>
<body>
<div class="container">
  <div class="header" >
<?php
  	$productName=$_GET['no'];
	include("mysql_connect.inc.php");
	$sql = "SELECT * FROM `product` WHERE `product_name` = '$productName';";
	$result = mysql_query($sql);
	$product = mysql_fetch_array($result);
	
	echo "<div style='text-align:'center'>";
	echo "<div style='margin:0 auto; width:500px; text-align:left'>";
	echo "<img src='images/".$product['product_name'].".jpg' width=300 height=300 title='".$product['product_name']."' border='1'><br>";
	echo "<p>名稱：".$product['product_name']."</p>";
	echo "<p>類別：".$product['type_name']."</p>";
	echo "<p>成份：".$product['ingredients']."</p>";	
	echo"</div>";
	echo"</div>";
		



 ?>

  </div> <!-- end .container -->
</div> <!-- end .container -->
</body>
</html>
