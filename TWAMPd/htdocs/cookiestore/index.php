<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>

<!--水平雙層子選單_menu-->
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<script type="text/javascript" src="js/menu.js"></script>

<!--燈箱效果_fancybox-->
<!-- Add fancyBox main JS and CSS files -->
<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css" />
<script type="text/javascript" src="js/fancybox/fancybox.js"></script>
<!-- Add mousewheel plugin (this is optional) --> 
<script type="text/javascript" src="js/fancybox/mousewheel-3.0.6.pack.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	  $(".fancybox").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
	  });
	});
</script>

</head>
<body>
<div class="container">
  <div class="header" >
    <a target="ifrPage" href="default.php"><img src="images/logo.jpg" width=180 height=100 title="餅乾小舖" border="0"></a>
    <div class="nav">
      <ul id="menu">
	    <li><a target="ifrPage" href="default.php">產品瀏覽</a>
        <li><a target="ifrPage" href="productSearch.php">產品查詢</a>
        </li>
        <li><a target="ifrPage" href="storeSearch.php">店舖一覽</a></li>
        <li><a target="ifrPage" href="shoppingCar.php">購物車</a></li>
		<?php if($_SESSION['id']=="mk816017"){ ?>
        	<li><a target="ifrPage" href="adminer.php">後台管理</a></li>
            <li><a href="logout.php">登出</a></li>
        <?php }else if($_SESSION['id']!= null){ ?>
        	<li><a target="ifrPage" href="management.php">會員管理</a></li>
            <li><a href="logout.php">登出</a></li>
        <?php }else{ ?>
        	<li><a class="fancybox" data-fancybox-type="iframe" a href="login.php">登入</a></li>
        <?php }; ?>
      </ul>       
    </div> <!-- end .nav -->
  </div> <!-- end .header -->
  <div  class="content" >
    
  	<iframe id="ifrPage" name="ifrPage" 
    <?php if($_SESSION['id']=="mk816017"){ ?>
			src="adminer.php"
	<?php }else if($_SESSION['id']!=NULL){ ?>
    		src="management.php"
	<?php }else { ?>
			src="default.php"
	<?php }; ?>
	 width="960px" height="1200px"  frameborder="0" scrolling="no"></iframe>
  </div> <!-- end .container -->
</div> <!-- end .container -->
</body>
</html>
