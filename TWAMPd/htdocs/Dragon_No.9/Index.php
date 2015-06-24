<?php session_start();
if(isset($_SESSION['ID'])){//已登入
  switch ($_SESSION['competence']) {
    case "adminer"://回到系統管理員頁面
      echo '<meta http-equiv=REFRESH CONTENT=0;url=adminerPage.php>';
      break;
    case "clerk"://回到圖書館員頁面
      echo '<meta http-equiv=REFRESH CONTENT=0;url=clerkPage.php>';
      break;
    case "student"://回到使用者頁面
      echo '<meta http-equiv=REFRESH CONTENT=0;url=studentPage.php>';
      break;
  }
}else{ ?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>讀書空間預借系統-登入</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <img src="images/background/banner.png" width="600" height="250" border="0" >
        <form name="form" method="post" action="process/connect.php" style="margin-top:50px">
          <span>帳號：</span><input type="text" name="id"> <br>
          <span>密碼：</span><input type="password" name="pw"> <br>
          <input type="submit" name="button" value="登入">
        </form>
      </div> <!-- end .content -->
    </div> <!-- end .container -->
  </body>
  </html>
<?php } ?>

