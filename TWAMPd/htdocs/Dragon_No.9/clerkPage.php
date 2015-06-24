<?php session_start();
if($_SESSION['competence']!="clerk"){//非系統管理員
  echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}else{ ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>讀書空間預借系統-圖書館員頁面</title>
    <!--基本樣式-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <!--網頁頁籤_abgne_tab-->
    <link rel="stylesheet" type="text/css" href="css/abgne-block.css" />
    <script type="text/javascript" src="js/abgne-block.js"></script>
    <script type="text/javascript" src="js/jquery.jget.js"></script>
    <!--燈箱效果_fancybox-->
    <!-- Add fancyBox main JS and CSS files -->
    <link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css" />
    <script type="text/javascript" src="js/fancybox/fancybox.js"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="js/fancybox/mousewheel-3.0.6.pack.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox({
        prevEffect  : 'none',
        nextEffect  : 'none',
        });
      });
    </script>
    <!--自訂義-->
    <style type="text/css">
      .overf{
        overflow:scroll;
        overflow-x:visible;
        margin:0 auto;
        width:700px;
        height:300px;
      }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="content" >
      <?php
      include("process/Dragon_No.9.inc.php");
      $sql = "SELECT `name` FROM `adminer` WHERE `ID` = '".$_SESSION['ID']."';";
      $result = mysql_query($sql);
      $clerk = mysql_fetch_array($result);
      ?>
      <div style="text-align:left; padding:10px;">
        管理員：<?php echo $clerk[name];?></div>
      <div style="text-align:right; padding-right:40px;">
        <input type="button" value="登出" onclick="if(confirm('確定登出?'))
          return document.location.href='process/logout.php' ;else return false;">
      </div>
    </div> <!-- end .content -->
  </div> <!-- end .container -->
  </body>
  </html>
<?php } ?>
