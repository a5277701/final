<style type="text/css">
	.desk{
		height: 25px;
		width: 25px;
		background-color: rgb(255,255,255);
		margin: 5px;
		padding: 5px;
		display:inline;
	}
	.desk_r{border: 2px outset red;}
	.desk_g{border: 2px outset green;}
</style>
<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}else{
	include("Dragon_No.9.inc.php");
	switch ($_POST['choose']) {
		case "date":
			if($_POST['select_date']!=null){
				$date= $_POST['select_date'];
				$sql = "SELECT * FROM time";
				$result = mysql_query($sql);
				while($time = mysql_fetch_array($result)){
					$str.="<option value=".$time[timeID].">".$time[time]."</option>";
				}
				echo $str;
			}
			break;
		case "time":
			if($_POST['select_time']!=null){
				function decide_R($deskID) {
					//$sql = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
					$sql ="SELECT `deskNo` FROM borrowdetail WHERE `timeNo`='".$_POST['select_time']."' and `date`='".$_POST['select_date']."'";
					$result = mysql_query($sql);
					$r=false; //預設未重複
					while($desk_n = mysql_fetch_array($result)){
						if($deskID==$desk_n[deskNo]){
							$r=true; //有重複
						}
					}
					if($r){ //$r為真
						return "<div class='desk desk_r'>".$deskID."</div>";
					}else{
						return "<div class='desk desk_g'>".$deskID."</div>";
					}
				}
				$sql = "SELECT * FROM desk order by deskID asc";
				$result = mysql_query($sql);
				$i=0;
				while($desk = mysql_fetch_array($result)){
					if($i!=0 && $i%10==0) {
						$str.="<br/><br/>";
					}else if($i==0 &&$i%10==0){
						$str.="<br/>";
					}
					$i++;
					$str.=decide_R($desk[deskID]);
				}
				echo $str;
			}
			break;
		default:
			echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
			break;
	}
}
?>
