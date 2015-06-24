<?php session_start();
if($_SESSION['competence']!="student"){//非學生
  echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';//回到首頁
}else{
  if(isset($_POST['chkbx'])){
    include("Dragon_No.9.inc.php");
    $a=$_POST['chkbx'];
    for ($i=0;$i<count($a);$i++) {
  	  $sql = "DELETE FROM `borrowdetail` WHERE `borrowNo` = ".$a[$i].";";
  	  //查詢字串，SELECT敘述，選取name相符欄位
  	  mysql_query($sql);
  	  //送出查詢，將結果放入$result
    };
    echo "<script language='JavaScript'>window.alert('刪除成功！');</script>";
    echo "<script language='JavaScript'>history.go(-1)</script>";
  }else{
    echo "<script language='JavaScript'>window.alert('未選取！');</script>";
    echo "<script language='JavaScript'>history.go(-1)</script>";
  }
}
?>