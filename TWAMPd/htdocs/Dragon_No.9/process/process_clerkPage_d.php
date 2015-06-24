<?php
include("Dragon_No.9.inc.php");
	if($_REQUEST['select_time']!=null){

		function decide_R($deskID) {
			//$sq3 = "SELECT `deskID` FROM `desk` where exists (select * from `borrowdetail` where `deskID`=deskNO and `timeNo`='$select_time' and `date`='$select_date')";
			$sq3 ="SELECT `deskNo` FROM borrowdetail WHERE `timeNo`='".$_REQUEST['select_time']."' and `date`='".$_REQUEST['select_date']."'";
			$result3 = mysql_query($sq3);
			$i=0;
			while($desk_n = mysql_fetch_array($result3)){
				if($deskID==$desk_n[deskNo]){
					$i=1;
				}
			}

			if($i==1){
				if((int)$deskID<10){
					return "<div class='desk dr'>0".$deskID."</div>";}
				else{
					return "<div class='desk dr'>".$deskID."</div>";}
			}else{
				if((int)$deskID<10){
					return "<div class='desk dg'>0".$deskID."</div>";}
				else{
					return "<div class='desk dg'>".$deskID."</div>";}
			}
		}
		$sql = "SELECT * FROM desk order by deskID asc";
		$tn = mysql_query($sql);
		$i=0;
		while($desk = mysql_fetch_array($tn)){
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
 ?>
