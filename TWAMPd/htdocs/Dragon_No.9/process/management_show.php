<?php session_start();
if($_SESSION['competence']!="student"){//非學生
  echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';//回到首頁
}else{
  include("Dragon_No.9.inc.php");
  $id=$_SESSION['ID'];
  $today=date('Y-m-d');
  $sql = "SELECT * FROM `borrowdetail` WHERE `studentID` = '$id' AND `date` >='$today' ORDER BY `date` ;";
  $result = mysql_query($sql);
  $sn_index=mysql_num_rows($result);
  for($index=0;$index<$sn_index;$index++){
    $arr[$index]=mysql_fetch_array($result);
  };
  for ($index=0;$index<$sn_index;$index++){
    $sql ="SELECT * FROM `time` WHERE `timeID` =(SELECT `timeNo` FROM `borrowdetail` WHERE `borrowNo`=".$arr[$index]['borrowNo']." AND`studentID` = '$id')";
    $result =mysql_query($sql);
    $time =mysql_fetch_array($result);
    $now =date('H:i:s');
    if ($today==$arr[$index]['date'] && $now>$time[time_end]){//如果同天 判斷時段 鎖定核取方塊
      echo "<tr><td><input type=checkbox name=chkbx[] disabled></td>";
    }else{ //否則就正常印出
      echo "<tr><td><input type=checkbox name=chkbx[] value=".$arr[$index]['borrowNo']."></td>";
    }
    $sql ="SELECT deskNo FROM borrowdetail WHERE borrowNo='".$arr[$index]['borrowNo']."'";
    $result = mysql_query($sql);
    $record_deskNo=mysql_fetch_array($result);
    $sql ="SELECT time FROM time WHERE timeID=(select timeNo from borrowdetail WHERE borrowNo='".$arr[$index]['borrowNo']."')";
    $result = mysql_query($sql);
    $record_time=mysql_fetch_array($result);
    echo "<td>".$record_deskNo['deskNo']."</td>";
    echo "<td>".$record_time['time']."</td>";
    echo "<td>".$arr[$index]['date']."</td></tr>";
  }
}
?>