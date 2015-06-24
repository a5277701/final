<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("../mysql_connect.inc.php");
	//指定使用cookiestore資料庫
	if(isset($_POST['chkM'])){
	if($_POST['submit']=="會員修改"){
		$a=$_POST['chkM'];
		for ($i=0;$i<count($a);$i++) {
		 $name1="name".$a[$i];
		 $name=$_POST[$name1];
		 $birthday1="birthday".$a[$i];
		 $birthday=$_POST[$birthday1];
		 $sex1="sex".$a[$i];
		 if($_POST[$sex1]=="男"){
			 $sex=1;
		 }else{
			 $sex=2;
		 }
		 $phone1="phone".$a[$i];
		 $phone=$_POST[$phone1];
		 $email1="email".$a[$i];
		 $email=$_POST[$email1];
		 $id1="id".$a[$i];
		 $id=$_POST[$id1];
		 $code1="code".$a[$i];
		 $code=$_POST[$code1];
	

		 $sql="UPDATE `member` SET
				`member_no` = '".$a[$i]."',
				`name` = '".$name."',
				`birthday` = '".$birthday."',
				`sex` = ".$sex.",
				`phone` = '".$phone."',
				`e-mail` = '".$email."',
				`id` = '".$id."',
				`code` = '".$code."'
				WHERE `member_no` = '".$a[$i]."';";
				
		 if(mysql_query($sql)){
			 echo "<script language='JavaScript'>window.alert('UPDATE ok！');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';
		 }else{
			echo "<script language='JavaScript'>window.alert('UPDATE fail！');</script>";
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminer.php>';

		 }
		};


		
	}else if($_POST['submit']=="會員刪除"){
		$a=$_POST['chkM'];
		for ($i=0;$i<count($a);$i++) {	
			echo $a[$i];
			$sql = "DELETE FROM `member`
					WHERE `member_no` = '".$a[$i]."';";
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