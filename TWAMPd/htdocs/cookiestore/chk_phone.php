<?php
include("mysql_connect.inc.php");
  $sql = "SELECT * FROM `member` WHERE `phone` = '".$_POST["id"]."';";
  //查詢字串，SELECT敘述，選取name相符欄位
  $result = mysql_query($sql);
  //送出查詢，將結果放入$result
  $sn_index=mysql_num_rows($result);
if($sn_index ==0)
{ 
  $ret = "<span style='color:green'>此電話可以使用</span>";
}
else
{
  $ret = "<span style='color:red'>此電話已經有人使用</span>";
}
echo  $ret;

?>