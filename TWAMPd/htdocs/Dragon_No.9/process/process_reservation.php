<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}else{
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case "date":
			$limit=mktime(15,00,0,date("m"),date("d"),date("Y"));
			$now=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
			$str.= '<option value="" >請選擇</option>';
			if($now>=$limit){
				for($i=1;$i<=3;$i++){
				$str.= '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
			}else{
				for($i=0;$i<=2;$i++){
				$str.= '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
			}
			echo $str;
			break;
		case "time":
			if($_POST['select_date']!=null){
				$date= $_POST['select_date'];
				$sql = "SELECT * FROM time";
				$result = mysql_query($sql);
				$str.= "<option value=''>請選擇</option>";
				while($time = mysql_fetch_array($result)){
					if($date==date('Y-m-d')){
						$now= date('H:i:s');
						$b=$time[time_start];
						if ($now<$b){
							$str.="<option value=".$time[timeID].">".$time[time]."</option>";
						}
					}else{
						$str.="<option value=".$time[timeID].">".$time[time]."</option>";
					}
				}
				echo $str;
			}else{
				echo "<option value=''>請先選擇日期</option>";
			}
			break;
		case "desk":
			if($_REQUEST['select_time']!=null){
				function decide_R($deskID) {

					//$sq3 = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
					$sq3 = "SELECT `deskNo` FROM `borrowdetail` where `timeNo`='".$_REQUEST['select_time']."' and `date`='".$_REQUEST['select_date']."'";
					$result3 = mysql_query($sq3);
					$i=0;
					while($desk_n = mysql_fetch_array($result3)){
						if($deskID==$desk_n[deskNo]){
							$i=1;
						}
					}
				  	if($i==1){
				  		//return "<option disabled>".$deskID."</option>";
					}else{
						return "<option value=".$deskID.">".$deskID."</option>";
					}
				}
				$sql="SELECT distinct `deskDist` FROM `desk`";
				$result = mysql_query($sql);
				$str.="<option value=''>請選擇</option>";
				while($deskDist = mysql_fetch_array($result)){
					$str.="<optgroup label=".$deskDist[deskDist].">";
					$sq2 = "SELECT `deskID` FROM `desk` where `deskDist`='$deskDist[deskDist]'";
					$result2 = mysql_query($sq2);
					while($desk = mysql_fetch_array($result2)){
						$str.=decide_R($desk[deskID]);
					}
					$str.="</optgroup>";
				}
				echo $str;
			}
			break;
		default:
			if( $_POST["select_date"] !=null && $_POST["select_time"] !=null && $_POST["select_desk"] !=null ){
				$ID=$_SESSION['ID'];
				$deskNo=$_POST["select_desk"];
				$timeNo=$_POST["select_time"];
				$date=$_POST["select_date"];
				$sql = "SELECT * FROM `borrowDetail` WHERE `deskNo` = '$deskNo' AND `timeNo` = '$timeNo' AND `date` = '$date'";
				$result = mysql_query($sql);
				$sn_index=mysql_num_rows($result);
				if($sn_index > 0){
					echo "<script language='JavaScript'>window.alert('已被預借！');</script>";
				}else{
					$sql ="SELECT * FROM `borrowDetail` WHERE `studentID`='$ID' AND `timeNo` = '$timeNo' AND `date`='$date'";
					$result = mysql_query($sql);
					$sn_index=mysql_num_rows($result);
					if($sn_index ==0){
						$sql = "INSERT INTO `borrowDetail` (`studentID`,`deskNo`,`timeNo`,`date`) VALUES ('$ID','$deskNo','$timeNo','$date')";
						$result = mysql_query($sql);
						echo "<script language='JavaScript'>window.alert('預借成功！');</script>";
						echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
					}else{
						echo "<script language='JavaScript'>window.alert('同時段不得預借兩個位置');</script>";
						echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
					}
				}
			}else{
				echo "<script language='JavaScript'>window.alert('請選擇完整');</script>";
				echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
			}
			break;
	}

}
?>