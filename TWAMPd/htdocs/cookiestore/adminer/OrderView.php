<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<script type="text/javascript" src="file:///C|/TWAMPd/htdocs/js/jquery-2.1.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="file:///C|/TWAMPd/htdocs/css/style.css" />


</head>
<body>
<div class="container">
  <div class="header" >
<?php
  	$orderNo=$_GET['no'];
	include("../mysql_connect.inc.php");
	$sql = "SELECT * FROM `order_content` WHERE `order_no` = '".$orderNo."';";
	$result = mysql_query($sql);
	$sn_index=mysql_num_rows($result);
	for($index=0;$index<$sn_index;$index++){
	//設定迴圈，執行一次就將一row的值放入陣列$arr中
		$arr[$index]=mysql_fetch_array($result);
		//取出查詢結果，放入陣列$arr
	};

?>
  <div style="overflow:scroll; overflow-x:visible;margin:0 auto; width:800px; height:500px">
  <form action="adminerOrderContent.php" method="post" name="form4">
        <table align="center" border="1">
          <tr align="center">
            <td>訂單編號</td>
            <td>產品價錢流水號</td>
            <td>數量</td>
          </tr>					
      <?php
      for ($index=0 ; $index < $sn_index ; $index++){
      //設定迴圈，執行一次印出一row
      ?>
          <tr align="center">
            <td><label><input type=checkbox name=chkS[] value='<?php echo $arr[$index]['order_no'] ?>'><?php echo $arr[$index]['order_no'] ?></label></td>
            <td><a  href='PPView.php?no=<?php echo $arr[$index]['pp_no'] ?>'>
            <input type='text' style='width:100px' name='<?php echo $arr[$index]['pp_no']?>' value='<?php echo $arr[$index]['pp_no']?>'></a></td>
            <td><input type='text' style='width:100px' name='<?php echo $arr[$index]['quantity']?>' value='<?php echo $arr[$index]['quantity']?>'></td>
          </tr>
      <?php };?>
      </table>
     </form>
   </div>

  </div> <!-- end .container -->
</div> <!-- end .container -->
</body>
</html>
