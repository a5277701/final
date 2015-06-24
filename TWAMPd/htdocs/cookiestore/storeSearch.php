<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>
<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
</head>
<body>

<?php
  include("mysql_connect.inc.php");
  //指定使用cookiestore資料庫
  $sql = "SELECT * FROM store ";
  //查詢字串，SELECT敘述，選取name相符欄位
  $result = mysql_query($sql);
  //送出查詢，將結果放入$result
  $sn_index=mysql_num_rows($result);
  //查詢結果的筆數紀錄(rows)

  for($index=0;$index<$sn_index;$index++){
  //設定迴圈，執行一次就將一row的值放入陣列$arr中
	  $arr[$index]=mysql_fetch_array($result);
	  //取出查詢結果，放入陣列$arr
  };
  if( $sn_index==0){
	  $QQ=1;
  }else{ $QQ=2;};
?>

<div class="container clearfix">
  <div  class="content clearfix" >
  	<h2 align="center">店舖一覽</h2>
	  <table align="center" border="5">
        <tr align="center">
          <td>店舖編號</td>
          <td>店舖名稱</td>
          <td>店舖地址</td>
          <td>店舖電話</td>
          <td>負責人</td>
          <td>負責人電話</td>
        </tr>

	<?php
    for ($index=0 ; $index < $sn_index ; $index++){
    //設定迴圈，執行一次印出一row
    ?>
        <tr align="center">
          <td><?php echo $arr[$index]['store_no']?></td>
          <td><?php echo $arr[$index]['store_name']?></td>
          <td><?php echo $arr[$index]['store_add']?></td>
          <td><?php echo $arr[$index]['store_phone']?></td>
          <td><?php echo $arr[$index]['manager']?></td>
          <td><?php echo $arr[$index]['manager_phone']?></td>
        </tr>
    <?php };?>
    </table>
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>
