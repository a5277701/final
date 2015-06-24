<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理員註冊檢查</title>
</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
	<h1 align="center">管理員註冊</h1>
 <?php
 //核對資料 

 if($_POST['id']=='' or $_POST['passwd']=='' or $_POST['repasswd']=='' or $_POST['name']=='' or $_POST['usersname']==''){
 	echo "欄位不可空白";
	header("refresh:2; url=regist.php");
    exit;
 }else if($_POST['passwd']!=$_POST['repasswd']){
 	echo "密碼並不相符，需重複鍵入相同密碼已確認";
	header("refresh:2; url=regist.php");
    exit;
 };
 
 
 
 $link=mysql_connect('localhost','root','') or die(mysql_error());
 mysql_select_db("moviemark") or die("無法選取資料庫");

 $sql="insert into member values('','".$_POST['name']."', '".$_POST['usersname']."', '".$_POST['passwd']."','".$_POST['id']."');";
 //新增語法
 $result=mysql_query($sql,$link);

 //執行
 if($result){
 //跳至檢視頁
    echo "會員註冊成功，請以此使用者帳號/密碼重新登入";
	header("refresh:2; url=index.php");
    exit;
 }else{
	echo "資料重複";
	header("refresh:2; url=regist.php");
    exit;
 }
 
 mysql_close($link);
 ?>
</body>
</html>
