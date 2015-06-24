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
		$Movie_no= $_REQUEST['Movie_no'];
		$Where_name=$_REQUEST['Movie_seat'];
		
		echo "<br />";
		echo "Movie_no(電影NO):".$Movie_no;	
		echo "<br />";
		echo "Where_name(影廳NO):".$Where_name;	
		echo "<br />";
		
		
	
	$sql = "SELECT * FROM `time` WHERE `Movie_no` = '$Movie_no' AND `Where_name` = '$Where_name'";
	
	$result = mysql_query($sql);
	while($time = mysql_fetch_array($result)){
		//echo $time["Time_no"];
		$Time_no=$time["Time_no"];
	}
	echo "Time_no(時間編號):".$Time_no;	
	echo "<br />";
	echo "<br /> ";
		
		
		$sql = "SELECT * FROM seat WHERE Where_name = '{$a}' order by Seat_no asc";
		$tn = mysql_query($sql);
		$str.="<table>";
		$i=0;
		while($time = mysql_fetch_row($tn)){
			if($i%10==0) {
				$str.="<br />";			
			}
			
			$sq2 = "SELECT * FROM mark WHERE Movie_no='$Movie_no' and Time_no='$Time_no' and Seat_no='$time[0]'";
			$tn2 = mysql_query($sq2);
			
			if (mysql_num_rows($tn2) != 0)
			{
			$str.="<label><input type='checkbox' checked='checked' disabled='disabled' name='selectseat[]' value=".$time[0].">".$time[0]."</label>";}else {
				$str.="<label><input type='checkbox'  name='selectseat[]' value=".$time[0].">".$time[0]."</label>";
			}
		
			$i++;
		}
		$str.="</table>";
		echo $str;
		
		
		
	}
 ?>