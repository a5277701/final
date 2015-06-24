<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");
  $name=$_POST["new_name"];
  $birthday="".$_POST["b_year"]."-".$_POST["b_month"]."-".$_POST["b_day"]."";
  $sex=$_POST["new_sex"];
  $phone=$_POST["new_phone"];
  $email=$_POST["new_mail"];
  $id=$_POST["new_id"];
  $code=$_POST["new_code"];
  if($name != null && $birthday != null && $sex != null && $phone != null && $email != null && $id != null && $code != null){ //驗證是從registration.php傳來的
	$sql = "SELECT * FROM `member` WHERE `phone` = '$phone' OR `e-mail` = '$email' OR `id` = '$id';";
	//查詢字串，SELECT敘述，查詢手機信箱及帳號是否重複
	$result = mysql_query($sql);
	//送出查詢，將結果放入$result
	$sn_index=mysql_num_rows($result);
	if($sn_index==0){ //沒有重複
	  $sql = "INSERT INTO `cookiestore`.`member` (`member_no`, `name`, `birthday`, `sex`, `phone`, `e-mail`, `id`, `code`) VALUES (NULL, '$name', '$birthday' , '$sex', '$phone', '$email', '$id', '$code');";
	  //設定查詢字串，將輸入的值新增至資料表
	  mysql_query($sql);
	  echo "<script language='JavaScript'>window.alert('註冊成功！轉跳登入頁面');</script>";
	  echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
	  //送出查詢字串
	}else{
	  echo "<script language='JavaScript'>window.alert('手機或信箱或帳號已註冊過！');</script>";
	  echo '<meta http-equiv=REFRESH CONTENT=0;url=registration.php>';	
	}
  }else if($_SESSION['id']!= null){
	echo '你已經登入了，無須註冊';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
  }else{
	echo '您無權限觀看此頁面!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
  }

?>


