<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>管理員登入</title>
<style type="text/css">
body {
	background-image: url(images/background.jpg);
	background-repeat: no-repeat;
}
body,td,th {
	font-size: larger;
	color: #000;
}
.t {
	color: #FF0;
}
.o {
	color: #FF9;
	font-weight: bold;
}
</style>
</head>
<body>
<form name="form1" action="index_check.php" method="post">

<h1 align="center" class="t">管理員登入</h1>
<p align="center"><span class="o">帳號：</span>
<input type="text" name="username"></p>
<p align="center"><span class="o">密碼：</span>
<input type="password" name="passwd"></p>
	<p align="center">
		<input type="submit" name="管理員登入">
	  <input type="button" value="加入會員" onclick="javascript:window.open('regist.php','_self')">
	</p>
    
</form>
	
</body>
</html>