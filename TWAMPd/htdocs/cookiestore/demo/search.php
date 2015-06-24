<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cookieStore</title>
</head>

<body>
<?php
if (isset($_POST["old_name"])){
//判斷新輸入姓名值是否存在
	$link_ID = mysql_connect("127.0.0.1", "mk816017", "123456");
		$oName=$_POST["old_name"];
	//連接MySQL伺服器
	mysql_select_db("cookiestore");
	//指定使用cookiestore資料庫
	$sql = "SELECT * FROM member WHERE name='$oName';";
	//查詢字串，SELECT敘述，選取name相符欄位
	$result = mysql_query($sql, $link_ID);
	//送出查詢，將結果放入$result
	mysql_close($link_ID);
	//關閉資料庫連結
	$record = mysql_fetch_array($result);
	//取得結果，以陣列回傳，放在$record中
}

 ?>



請在下列欄位輸入資料後按下查詢按鈕<br><br>
<form action="search.php" method="post">
姓名:<input type="text" name="old_name">
     <input type="submit" value="送出">
	 <input type="reset" value="清除">
</form>
<br><hr>
 
<?php
 if(isset($record)){
	echo '<h2 align="center">查詢結果</h2>';
	if ($record){
		echo "編號："; echo $record['member_no'];
		echo"<br>";
		echo "姓名："; echo $record['name'];
		echo"<br>";
		echo "生日："; echo $record['birthday'];
		echo"<br>";
		echo "性別："; echo $record['sex'];
		echo"<br>";
		echo "電話："; echo $record['phone'];
		echo"<br>";
		echo "住址："; echo $record['address'];
		echo"<br>";
		echo "信箱："; echo $record['e-mail'];
		echo"<br>";
		echo "帳號："; echo $record['id'];
		echo"<br>";
		echo "密碼："; echo $record['code'];
	}else{
		echo'查無此人!';
	}
}
?>


</body>
</html>
