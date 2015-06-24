<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>管理員註冊檢查</title>
<style type="text/css">
body {
	background-image: url(images/memberb.jpg);
	background-repeat: repeat;
	text-align: center;
}
</style>
</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
	<h1 align="center">&nbsp;</h1>
	<h1 align="center">&nbsp;</h1>
	<h1 align="center">管理員註冊</h1>
	<form name="form1" action=regist_check.php method=post>
		<table align="center" border="1">
			<tr>
			<td width="100"><center>帳號:</center></td>
			<td width="200"><center><input type="text" maxlength=12 name="usersname"></center></td>
		    </tr>

		    <tr>
			<td width="100"><center>密碼:</center></td>
			<td width="200"><center><input type="password" maxlength=12 name="passwd"></center></td>
		    </tr>

		    <tr>
			<td width="100"><center>密碼確認:</center></td>
			<td width="200"><center><align="center"><input type="password" maxlength=12 name="repasswd"><br>請再輸入一次密碼</br></center></td>
		    </tr>

		    <tr>
			<td width="100"><center>姓名:</center></td>
			<td width="200"><center><align="center"><input type="text" name="name"></center></td>
		    </tr>

		    <tr>
			<td width="100"><center>身分證字號:</center></td>
			<td width="200"><center><align="center"><input type="text" name="id"></center></td>
		    </tr>

		    <tr>
			<th colspan=2><input type="submit" name="送出" onclick="javascript:window.open('index.php','_self')">
            <input type="reset" name="重設"></th>
            
		  </tr>

      </table>
		
</form>
</body>
</html>