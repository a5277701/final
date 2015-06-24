<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cookieStore</title>
</head>

<body>
<?php
//下面if敘述將判斷輸入的值是否存在於資料庫中
//若存在於資料庫則執行刪除資料的動作
if (isset($_POST["old_id"])and isset($_POST["old_code"])){
	$link_ID = mysql_connect("127.0.0.1", "mk816017", "123456");
	//連接MySQL伺服器
	mysql_select_db("cookiestore");
	//指定使用cookiestore資料庫
	$sql = "DELETE FROM member WHERE code='".$_POST["old_code"]."' and id='".$_POST["old_id"]."'";
	//設定查詢字串，將輸入的帳密在資料表比對後刪除
	mysql_query($sql, $link_ID);
	//送出查詢字串
	mysql_close($link_ID);
	//關閉資料庫連結
};
?>

<br><br>
<form action="delete.php" method="post">
  帳號：<input type="text" name="old_id">
  密碼：<input type="text" name="old_code">
     <input type="submit" value="delete">
</form>
  
</body>
</html>
