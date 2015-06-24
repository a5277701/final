<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include("roombook.inc.php");
  $a=$_POST['chkbx'];
  for ($i=0;$i<count($a);$i++) {
	  $sql = "DELETE FROM `record` WHERE `record_no` = ".$a[$i].";";
	  //查詢字串，SELECT敘述，選取name相符欄位
	  mysql_query($sql);
	  //送出查詢，將結果放入$result
	  echo "<script language='JavaScript'>window.alert('刪除成功！');</script>";; 
  }
  echo '<meta http-equiv=REFRESH CONTENT=0;url=management.php>';
?>
