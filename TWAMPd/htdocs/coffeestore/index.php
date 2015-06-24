<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
<script type="text/javascript" src="js/1.js"></script>
<link rel="stylesheet" type="text/css" href="css/1.css" />
<script type="text/javascript" src="js/2.js"></script>
<link rel="stylesheet" type="text/css" href="css/2.css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 153px;
	height: 128px;
	z-index: 1;
	left: 10px;
	top: 10px;
}
#apDiv2 {
	position: absolute;
	width: 153px;
	height: 42px;
	z-index: 1;
	left: 844px;
	top: 3px;
}
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv5 {
	position: absolute;
	z-index: 1;
	width: 250px;
    height: 20px;
	left: 0px;
	top: 640px;
}
#abgne-block-20111227 {
	position: absolute;
	width: 1200px;
	height: 423px;
	z-index: 1;
	left: 82px;
	top: 200px;
}
#apDiv3 {
	position: absolute;
	width: 1400px;
	height: 50px;
	z-index: 1;
	left: 0px;
	top: 675px;
	background-color: #000000;
}
#apDiv4 {
	position: absolute;
	width: 1400px;
	height: 150px;
	z-index: 1;
	left: 0px;
	top: 0px;
	background-color: #000000;
	color: #FFF;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 60px;
	padding-left:225px 
	
	
}
<script type="text/javascript">
	
</script>
</style>


</head>

<body>
<div id="apDiv4">  
  <p>左營咖啡館</p>
</div>
<div id="apDiv1"><a href="index.php"><img src="images/logo.png" width="152" height="126" /></a></div>
<div id="apDiv2"><ul id="menu">
		<li><a href="#">咖啡館</a>
			<ul>
				<li><a href="h1.html"></a></li>
			</ul>
  </li>
		<li>
			<a href="#">地理位置</a>
			<ul>
				<li><a href="#"></a></li>
			</ul>
		</li>
		<li><a href="#">管理員</a>
        <ul>
        <?php if($_SESSION['amd'] != NULL){ ?>      
        <li><a href="logout.php">Logout</a></li>
        <?php }else{ ?>
        <li><a href="login.php">Login</a></li>
        <?php }; ?>
      </ul>
	</li>
		<li><a href="#">關於我們</a></li>
</ul></div>
<div id="abgne-block-20111227">
		<ul class="lists">
			<li><a href="images/11.jpg"><img alt="熱門NO.1卡啡那caffaina" src="images/11.jpg" /></a></li>
			<li><a href="images/12.jpg"><img alt="熱門NO.2昂司咖啡店" src="images/12.jpg" /></a></li>
			<li><a href="images/13.jpg"><img alt="熱門NO.3初めて。初日 珈琲 早午食 手作り甘味" src="images/13.jpg" /></a></li>
			<li><a href="images/14.jpg"><img alt="熱門NO.4咖咖加(Kakaja)輕食咖啡館" src="images/14.jpg" /></a></li>
			<li><a href="images/15.jpg"><img alt="熱門NO.5豆豆熊" src="images/15.jpg" /></a></li>
			
		</ul>
	</div>
    <div id=apDiv3>


</div>
<div id="apDiv5">
<?php if($_SESSION['name'] != NULL){	
	$username=$_SESSION['name'];echo $username.' 您好！';	
	include("mysql_connect.inc.php");
	}; 
?></div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
