<?php
	session_start();
	include("../process/Dragon_No.9.inc.php");

	if(isset($_POST['chkS']) or $_POST['add_s_ID']!=NULL){
		if($_POST['submit']=="學生修改"){
			$ID=$_POST['chkS'];
			for ($i=0;$i<count($ID);$i++) {
				$name_Temp="name".$ID[$i];
				$password_Temp="password".$ID[$i];
				$name=$_POST[$name_Temp];
				$password=$_POST[$password_Temp];

				echo $ID[$i]."<br>";
				$sql="UPDATE `student` SET `ID`='".$ID[$i]."',`name`='".$name."',`password`='".$password."' WHERE `ID`='".$ID[$i]."';";
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 修改成功！');</script>";
		 		}else{
					echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 修改失敗！');</script>";
				}
			}
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=0>';
		}else if($_POST['submit']=="學生刪除"){
			$ID=$_POST['chkS'];
			for ($i=0;$i<count($ID);$i++) {
				echo $ID[$i]."<br>";
				$sql = "DELETE FROM `student` WHERE `ID`='".$ID[$i]."';";
				if(mysql_query($sql)){
					echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 刪除成功！');</script>";
				}else{
					echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 刪除失敗！');</script>";
				}
			}
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=0>';
		}else if($_POST['submit']=="學生新增"){
			$ID=$_POST['add_s_ID'];
			$name=$_POST['add_s_name'];
			$PW=$_POST['add_s_PW'];
			foreach($ID as $i=> $add_ID) {
				echo $ID[$i]."<br>";
				if($add_ID!=null){
				 	$sql = "INSERT INTO `student` (`ID`,`name`,`password`) VALUES ('".$add_ID."','".$name[$i]."','".$PW[$i]."');";
					if(mysql_query($sql)){
						echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 新增成功！');</script>";
					}else{
						echo "<script language='JavaScript'>window.alert('學號:".$ID[$i]." 新增失敗！');</script>";
					}
				}else{
					echo "<script language='JavaScript'>alert('學號不得為空！');</script>";
				}
			}
			echo '<meta http-equiv=REFRESH CONTENT=0;url=../adminerPage.php?tab=0>';
		}else{
			echo "<script language='JavaScript'>window.alert('?');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";
		}
	}else{
		echo "<script language='JavaScript'>window.alert('未勾選！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";
	}
?>
