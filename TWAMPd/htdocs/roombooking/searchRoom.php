<?php
include("../mysql_connect.inc.php");
	if($_REQUEST['Movie_no']!=""){
		$a = $_REQUEST['Movie_no'];
		$sql = "SELECT * FROM time WHERE Movie_no = '{$a}' order by time asc";
		$tn = mysql_query($sql);
		$str.="<option>請選擇</option>";
		while($time = mysql_fetch_row($tn)){
			$str.="<option value=".$time[2].">".$time[3]."(".$time[2].")廳</option>";
		}
		echo $str;
	}
	
	if($_REQUEST['Movie_seat']!=""){
		$a = $_REQUEST['Movie_seat'];
		$sql = "SELECT * FROM seat WHERE Where_name = '{$a}' order by Seat_no asc";
		$tn = mysql_query($sql);
		$str.="<table>";
		while($time = mysql_fetch_row($tn)){
			$str.="<input type='button' value=".$time[0].">";
		}
		$str.="</table>";
		echo $str;
	}
 ?>