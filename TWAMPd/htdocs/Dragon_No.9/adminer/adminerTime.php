<?php
	session_start();
	include("Dragon_No.9.inc.php");

	if(isset($_POST['chkT'])){
		if($_POST['submit']=="時段修改"){
			$timeID=$_POST['chkT'];
			for ($i=0;$i<count($timeID);$i++) {
				$time_Temp="time".$timeID[$i];
				$time_start_Temp="time_start".$timeID[$i];
				$time_end_Temp="time_end".$timeID[$i];
				$time=$_POST[$time_Temp];
				$time_start=$_POST[$time_start_Temp];
				$time_end=$_POST[$time_end_Temp];

				$sql="UPDATE `time` SET
					`timeID` = '".$timeID[$i]."',
					`time` = '".$time."',
					`time_start` = '".$time_start."',
					`time_end` = '".$time_end."'
					WHERE `timeID` = '".$timeID[$i]."';";

				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$timeID[$i]." 修改成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=2>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$timeID[$i]." 修改失敗！');</script>";
					echo $sql."<br>";
				}
			}
		}else if($_POST['submit']=="時段刪除"){
			$timeID=$_POST['chkT'];
			for ($i=0;$i<count($timeID);$i++) {
				echo $deskID[$i]."<br>";
				$sql = "DELETE FROM `time`
					WHERE `timeID` = '".$timeID[$i]."';";
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$timeID[$i]." 刪除成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=2>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$timeID[$i]." 刪除失敗！');</script>";
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
