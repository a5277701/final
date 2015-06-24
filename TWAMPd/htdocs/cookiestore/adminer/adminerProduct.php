<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	
	//指定使用cookiestore資料庫
	if(isset($_POST['chkP'])){
		include("../mysql_connect.inc.php");
		if($_POST['submit']=="商品修改"){
			$a=$_POST['chkP'];
			for ($i=0;$i<count($a);$i++) {
			 $pname1="pname".$a[$i];
			 $pname=$_POST[$pname1];
			 $type1="type".$a[$i];
			 $typeN=$_POST[$type1];
			 $ingre1="ingre".$a[$i];
			 $ingre=$_POST[$ingre1];
			 
		 	  $sql="UPDATE `product` SET
				`product_no` = '".$a[$i]."',
				`product_name` = '".$pname."',
				`type_name` = '".$typeN."',
				`ingredients` = ".$ingre.",
				WHERE `product_no` = '".$a[$i]."';";
			
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('DELETE ok！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
				}else{
					echo "<script language='JavaScript'>window.alert('DELETE fail！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
				};
		};
	
			
		}else if($_POST['submit']=="商品刪除"){
			$a=$_POST['chkP'];
			for ($i=0;$i<count($a);$i++) {	
				echo $a[$i];
				$sql = "DELETE FROM `product`
						WHERE `product_no` = '".$a[$i]."';";
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
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
		}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
	}
?>
<title>CookieStore</title>

<!--基本樣式-->
</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>