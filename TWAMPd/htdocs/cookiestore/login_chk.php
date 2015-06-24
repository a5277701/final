<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("mysql_connect.inc.php");
  //連接資料庫，只要此頁面上有用到連接MySQL就要include它
  $id=$_POST["id"];
  $code=$_POST["code"];	
  $sql = "SELECT * FROM `member` WHERE `id` = '$id' AND `code` = '$code';";
  //查詢字串，SELECT敘述，選取name相符欄位
  $result = mysql_query($sql);
  //送出查詢，將結果放入$result
  $sn_index=mysql_num_rows($result);
  //查詢結果的筆數紀錄(rows)  
  if($sn_index!=0){//有符合的
	$_SESSION['id'] = $id;
	//將帳號寫入session，方便驗證使用者身份
	$name=mysql_fetch_array($result);
	echo "<script language='JavaScript'>window.alert('".$name['name']."，您好！');</script>";
	echo "<script>parent.window.location.href='index.php';</script>";;//回到首頁
  }else{
    echo "<script language='JavaScript'>window.alert('帳號或密碼錯誤！');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=login.php>';//回到登入頁面
  }
?>
