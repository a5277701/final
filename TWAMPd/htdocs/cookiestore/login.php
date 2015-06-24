<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>
<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>

<script type="text/javascript"> 
function checkdata() {
	if   (document.form1.id.value.length   ==   0)   {  
		alert("請輸您帳號!");
		document.form1.id.focus();
		return   false;
	}
	if   (document.form1.code.value.length   ==   0)   {  
		alert("請輸入密碼!");
		document.form1.code.focus();
		return   false;
	}
	document.form1.submit()
}
</script>

</head>
<body>
    <form action="login_chk.php" method="post" name="form1">
      帳　　號：<input type="text" name="id"><br />
      密　　碼：<input type="password" name="code"><br />
         <input type="button" value="登入" name="button1" onclick="checkdata()">
         <input type="button" value="註冊" onclick="document.location.href='registration.php'">
    </form>
</body>
</html>