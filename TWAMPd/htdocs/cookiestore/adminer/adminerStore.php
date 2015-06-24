<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	//指定使用cookiestore資料庫
	if(isset($_POST['chkS'])){
		include("../mysql_connect.inc.php");
	if($_POST['submit']=="店舖修改"){
		$a=$_POST['chkS'];
		for ($i=0;$i<count($a);$i++) {
		 $store_name1="store_name".$a[$i];
		 $store_name=$_POST[$store_name1];
		 $store_add1="store_add".$a[$i];
		 $store_add=$_POST[$store_add1];
		 $store_phone1="store_phone".$a[$i];
		 $store_phone=$_POST[$store_phone1];
		 $manager1="manager".$a[$i];
		 $manager=$_POST[$manager1];
		 $manager_phone1="manager_phone".$a[$i];
		 $manager_phone=$_POST[$manager_phone1];

		 $sql="UPDATE `store` SET
				`store_no` = '".$a[$i]."',
				`store_name` = '".$store_name."',
				`store_add` = '".$store_add."',
				`store_phone` = ".$store_phone.",
				`manager` = '".$manager."',
				`manager_phone` = '".$manager_phone."',

				WHERE `member_no` = '".$a[$i]."';";
				
		 if(mysql_query($sql)){
			 echo "<script language='JavaScript'>window.alert('UPDATE ok！');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
		 }else{
			echo "<script language='JavaScript'>window.alert('UPDATE fail！');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';

		 }
		};


		
	}else if($_POST['submit']=="店舖刪除"){
		$a=$_POST['chkS'];
		for ($i=0;$i<count($a);$i++) {	
			echo $a[$i];
			$sql = "DELETE FROM `store`
					WHERE `store_no` = '".$a[$i]."';";
			//查詢字串，SELECT敘述，選取name相符欄位
			if(mysql_query($sql)){
				echo "<script language='JavaScript'>window.alert('DELETE ok！');</script>";
				echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
			}else{
				echo "<script language='JavaScript'>window.alert('DELETE fail！');</script>";
				echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
			}

		};
		
	}else{
		echo "<script language='JavaScript'>window.alert('?');</script>";
	}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
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