<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("../mysql_connect.inc.php");
	//指定使用cookiestore資料庫
	if(isset($_POST['chkO'])){
	if($_POST['submit']=="訂單修改"){
		$Q=$_POST['chkO'];
		for ($i=0;$i<count($Q);$i++) {
		 $id1="OPid".$Q[$i];
		 $id=$_POST[$id1];
		 $store_name1="store_name".$Q[$i];
		 $store_name=$_POST[$store_name1];
		 $check1="check".$Q[$i];
		 if($_POST[$check1]=="no"){
			 $check=2;
		 }else{
			 $check=1;
		 }
		 $total1="total".$Q[$i];
		 $total=$_POST[$total1];
		 $pickup_date1="pickup_date".$Q[$i];
		 $pickup_date=$_POST[$pickup_date1];
		 	echo $Q[$i];
			echo $id;
			echo $store_name;
			echo $total;
			echo $pickup_date;
			echo $check;

		 $sql="UPDATE `order` SET
				`order_no` = '".$Q[$i]."',
				`id` = '".$id."',
				`store_name` = '".$store_name."',
				`total` = ".$total.",
				`pickup_date` = '".$pickup_date."',
				`check` = '".$check."',

				WHERE `order_no` = '".$Q[$i]."';";
				
		 if(mysql_query($sql)){
			 echo "<script language='JavaScript'>window.alert('UPDATE ok！');</script>";
			 echo "<script language='JavaScript'>history.back()</script>";
			 
			
		 }else{
			 echo "<script language='JavaScript'>window.alert('UPDATE fail！');</script>";
			 echo "<script language='JavaScript'>history.back()</script>";
			 
			

		 }
		};


		
	}else if($_POST['submit']=="訂單刪除"){
		$a=$_POST['chkO'];
		for ($i=0;$i<count($a);$i++) {	
			echo $a[$i];
			$sql = "DELETE FROM `order`
					WHERE `order_no` = '".$a[$i]."';";
			//查詢字串，SELECT敘述，選取name相符欄位
			if(mysql_query($sql)){
				echo "<script language='JavaScript'>window.alert('DELETE ok！');</script>";
				echo "<script language='JavaScript'>history.back()</script>";
				
				
			}else{
				echo "<script language='JavaScript'>window.alert('DELETE fail！');</script>";
				echo "<script language='JavaScript'>history.back()</script>";
				
				
			}

		};
		
	}else{
		echo "<script language='JavaScript'>window.alert('?');</script>";
	}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.back()</script>";
		
		
	}
?>
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>