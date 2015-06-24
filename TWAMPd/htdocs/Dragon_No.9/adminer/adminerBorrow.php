
<?php
	session_start();
	include("Dragon_No.9.inc.php");

	if(isset($_POST['chkB'])){
		if($_POST['submit']=="預借修改"){
			$borrowNo=$_POST['chkB'];
			for ($i=0;$i<count($borrowNo);$i++) {
				$studentID_Temp="studentID".$borrowNo[$i];
				$studentID=$_POST[$studentID_Temp];
				$deskNo_Temp="deskNo".$borrowNo[$i];
				$deskNo=$_POST[$deskNo_Temp];
				$timeNo_Temp="timeNo".$borrowNo[$i];
				$timeNo=$_POST[$timeNo_Temp];
				$date_Temp="date".$borrowNo[$i];
				$date=$_POST[$date_Temp];
				$datea_Temp="datea".$borrowNo[$i];
				$datea=$_POST[$datea_Temp];
				$check_Temp="check".$borrowNo[$i];
				$check=$_POST[$check_Temp];

				$sql="UPDATE `borrowdetail` SET
						`borrowNo` = '".$borrowNo[$i]."',
						`studentID` = '".$studentID."',
						`deskNo` = '".$deskNo."',
						`timeNo` = '".$timeNo."',
						`date` = '".$date."',
						`datea` = '".$datea."',
						`check` = '".$check."'
						WHERE `borrowNo` = '".$borrowNo[$i]."';";

				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$borrowNo[$i]." 修改成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=3>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$borrowNo[$i]." 修改失敗！');</script>";
					echo $sql."<br>";
				}
			}
		}else if($_POST['submit']=="預借刪除"){
			$borrowNo=$_POST['chkB'];
			for ($i=0;$i<count($borrowNo);$i++) {
				echo $borrowNo[$i]."<br>";
				$sql = "DELETE FROM `borrowdetail`
						WHERE `borrowNo` = '".$borrowNo[$i]."';";
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$borrowNo[$i]." 刪除成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=3>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$borrowNo[$i]." 刪除失敗！');</script>";
					echo $sql."<br>";
				}
			}
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
