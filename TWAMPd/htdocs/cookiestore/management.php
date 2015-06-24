
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<!--網頁頁籤_abgne_tab-->
<link rel="stylesheet" type="text/css" href="css/abgne-block.css" />
<script type="text/javascript" src="js/abgne-block.js"></script>

</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >
  	<?php
	//此判斷為判定觀看此頁有沒有權限
	//說不定是路人或不相關的使用者
	//因此要給予排除
	if($_SESSION['id'] != null)
	{
	  include("mysql_connect.inc.php");
	  
	  //將資料庫裡的所有會員資料顯示在畫面上
	  $sql = "SELECT * FROM `member` WHERE `id` = '".$_SESSION['id']."';";
	  $result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
		  echo "姓名：".$row['name']."<br>
		  生日：".$row['birthday']."<br>
		  性別：".$row['sex']."<br>
		  電話：".$row['phone']."<br>
		  信箱：".$row['e-mail']."<br>";
		}
	}else{
	  echo "<script language='JavaScript'>window.alert('無權限瀏覽此頁面！');</script>";
	  echo "<script>parent.window.location.href='index.php';</script>";;//回到首頁
	}
	?>
      <form action="adminer/adminerOrder.php" method="post" name="form4">
        <table align="center" border="1">
          <tr align="center">
            <td>訂單編號</td>
            <td>帳號</td>
            <td>店舖名稱</td>
            <td>總額</td>
            <td>取貨日期</td>
          </tr>					
      <?php
	  include("mysql_connect.inc.php");
	  //指定使用cookiestore資料庫
	  $id=$_SESSION['id'];
	  $sq2 = "SELECT * FROM `order` WHERE `id` = '$id'";
	  //查詢字串，SELECT敘述，選取name相符欄位
	  $result2 = mysql_query($sq2);
	  //送出查詢，將結果放入$result
	  $sn_index=mysql_num_rows($result2);
	  //查詢結果的筆數紀錄(rows)
	
	  for($index=0;$index<$sn_index;$index++){
	  //設定迴圈，執行一次就將一row的值放入陣列$arr中
		  $arr[$index]=mysql_fetch_array($result2);
		  //取出查詢結果，放入陣列$arr
	  };
      for ($index=0 ; $index < $sn_index ; $index++){
      //設定迴圈，執行一次印出一row					
      echo "<tr align='center'>";
      echo "<td><input type=checkbox name=chkO[] value='".$arr[$index]['order_no']."'>
      <a class='fancybox' data-fancybox-type='iframe' href='adminer/OrderView.php?no=".$arr[$index]['order_no']."'>".$arr[$index]['order_no']."</a></td>";
      echo "<td>".$arr[$index]['id']."</td>";
      echo "<td><input type='text' style='width:250px' name='store_name".$arr[$index]['order_no']."' value='".$arr[$index]['store_name']."'></td>";
      echo "<td>".$arr[$index]['total']."</td>";
      echo "<td><input type='text' style='width:70px' name='pickup_date".$arr[$index]['order_no']."' value='".$arr[$index]['pickup_date']."'></td>";
      echo "</tr>";
       };?>
      </table>
    <input type="submit" value="訂單修改" name="submit" >
    <input type="submit" value="訂單刪除" name="submit" >
     </form>

  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>