<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("roombook.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM user where name_id = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['name_id'] = $id;
		$sql = "SELECT * FROM `user` WHERE `name_id` = '$id'";
		$result = mysql_query($sql);
		$record=mysql_fetch_array($result);
		$_SESSION['Name']=$record['Name'];
	echo "<script>parent.window.location.href='reservation.php';</script>";;//導向預借頁面
  }else{
    echo "<script language='JavaScript'>window.alert('登入失敗！');</script>";
    echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';//回到首頁
}
?>