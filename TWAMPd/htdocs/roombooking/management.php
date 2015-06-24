<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RoomBooking</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<?php
if($_SESSION['name_id'] != null){
    //連接資料庫
	include("roombook.inc.php");
	$id=$_SESSION['name_id'];
	$sql = "SELECT * FROM `record` WHERE `name_id` = '$id' ORDER BY `Date` ;";
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
}else{
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';//回到首頁
}
?>
</head>
<body>
<div class="container clearfix">

  <div style="text-align:center">
  	<div class="content clearfix"> <!--內容-->
   <div class="clearfix" style="float: left; margin-right: 20px;padding:50px 0 0 150px;">
      <img src="background/manage.png" width=600 height=250 border="0" >
    </div>
  </div> 
  </div>
	<form name="form1" method="post" action="management_delete.php">
	<?php
    for ($index=0 ; $index < $sn_index ; $index++){
    //設定迴圈，執行一次印出一row
    ?>
        <input type=checkbox name=chkbx[] value=<?php echo $arr[$index]['record_no'] ?>>
		<?php
          echo $arr[$index]['name_id'];
		  echo " ";
		  $sql ="SELECT * FROM `period` WHERE `Time_code` = '".$arr[$index]['Time_code']."'";
		  $result = mysql_query($sql);
		  $record=mysql_fetch_array($result);
          echo $record['Room_no']; 
		  echo " ";
          echo $record['Time']; 
		  echo " ";
          echo $arr[$index]['Date']; ?><br />
    <?php };?>
	    <input type="submit" name="button" value="刪除" />
    </form>
  
</div> <!-- end .container -->
</body>
</html>
