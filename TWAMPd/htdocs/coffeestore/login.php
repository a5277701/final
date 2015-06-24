<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員登入</title>
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<style type="text/css">
body {
	
}
#apDiv1 {
	position: absolute;
	width: 54px;
	height: 24px;
	z-index: 1;
	left: 659px;
	top: 209px;
}
.title {
	font-family: "Cataneo BT";
	font-weight: bold;
	font-size: 72px;
}
</style>

<script type="text/javascript"> 
function checkdata() {
	if   (document.form1.amd.value.length   ==   0)   {  
		alert("請輸您帳號!");
		document.form1.id.focus();
		return   false;
	}
	if   (document.form1.pwd.value.length   ==   0)   {  
		alert("請輸入密碼!");
		document.form1.code.focus();
		return   false;
	}
	document.form1.submit()
}
</script>

</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

    <h1 align="center" class="title">Login</h1>
	<form action="login_chk.php" method="post" name="form1">
		<table align="center" border="1">
			<tr>
			<td width="100"><center>帳號:</center></td>
			<td width="200"><center><input type="text" name="amd"></center></td>
		    </tr>

		    <tr>
			<td width="100"><center>密碼:</center></td>
			<td width="200"><center><input type="password" name="pwd"></center></td>
		    </tr>

		  
		    <tr>
			<th colspan=2>
            	<input type="button" value="登入" name="button1" onclick="checkdata()">
         		<input type="reset" value="取消"></th>
			</tr>

		    </table>
		
	</form>
        <p align="center"><a href="index.php">回首頁</a></p>
</body>
</html>