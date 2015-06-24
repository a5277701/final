<?php
	session_start();
	include("../process/Dragon_No.9.inc.php");

	if(isset($_POST['chkD']) or $_POST['add_d_ID']!=NULL){
		if($_POST['submit']=="書桌修改"){
			$deskID=$_POST['chkD'];
			for ($i=0;$i<count($deskID);$i++) {
				$deskType_Temp="deskType".$deskID[$i];
				$deskDist_Temp="deskDist".$deskID[$i];
				$deskDist=$_POST[$deskDist_Temp];
				if($_POST[$deskType_Temp]=="QQ"){
					$deskType=1;
				}else if($_POST[$deskType_Temp]=="AA"){
					$deskType=2;
				}

		 		$sql="UPDATE `desk` SET
					`deskID` = '".$deskID[$i]."',
					`deskType` = ".$deskType.",
					`deskDist` = '".$deskDist."'
					WHERE `deskID` = '".$deskID[$i]."';";

				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$deskID[$i]." 修改成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=1>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$deskID[$i]." 修改失敗！');</script>";
					echo $sql."<br>";
				}
			}
		}else if($_POST['submit']=="書桌刪除"){
			$deskID=$_POST['chkD'];
			for ($i=0;$i<count($deskID);$i++) {
				echo $deskID[$i]."<br>";
				$sql = "DELETE FROM `desk`
					WHERE `deskID` = '".$deskID[$i]."';";
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('編號:".$deskID[$i]." 刪除成功！');</script>";
					echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=1>';
				}else{
					echo "<script language='JavaScript'>window.alert('編號:".$deskID[$i]." 刪除失敗！');</script>";
					echo $sql."<br>";
				}
			}
		// }else if($_POST['submit']=="書桌新增"){
		// 	$ID=$_POST['add_d_ID'];
		// 	$name=$_POST['add_d_name'];
		// 	$PW=$_POST['add_d_PW'];
		// 	foreach($ID as $i=> $add_ID) {
		// 		echo $ID[$i]."<br>";
		// 		if($add_ID!=null){
		// 		 	$sql = "INSERT INTO `student` (`ID`,`name`,`password`) VALUES ('".$add_ID."','".$name[$i]."','".$PW[$i]."');";
		// 			if(mysql_query($sql)){
		// 				echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 新增成功！');</script>";
		// 			}else{
		// 				echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 新增失敗！');</script>";
		// 			}
		// 		}else{
		// 			echo "<script language='JavaScript'>alert('學號不得為空！');</script>";
		// 		}
		// 	}
		// 	echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=0>';
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
