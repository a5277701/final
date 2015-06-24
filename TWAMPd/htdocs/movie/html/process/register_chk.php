<?php
	include("movie.inc.php");
	switch ($_POST['choose']){
		case "account":
			$sql = "SELECT * FROM `member` WHERE `member_account` = '".$_POST["account"]."';";
			$result = mysql_query($sql);
			$sn_index=mysql_num_rows($result);
			if($sn_index ==0){
				$ret = "<span class='register_Prompt_OK'>此帳號可以使用</span>";
			}else{
				$ret = "<span class='register_Prompt_fail'>此帳號已經有人使用</span>";
			}
			echo $ret;
			break;
		case "mail":
			$sql = "SELECT * FROM `member` WHERE `member_e-mail` = '".$_POST["mail"]."';";
			$result = mysql_query($sql);
			$sn_index=mysql_num_rows($result);
			if($sn_index ==0){
				$ret = "<span class='register_Prompt_OK'>此信箱可以使用</span>";
			}else{
				$ret = "<span class='register_Prompt_fail'>此信箱已經有人使用</span>";
			}
			echo $ret;
			break;
		case "phone":
			$sql = "SELECT * FROM `member` WHERE `member_phone` = '".$_POST["phone"]."';";
			$result = mysql_query($sql);
			$sn_index=mysql_num_rows($result);
			if($sn_index ==0){
				$ret = "<span class='register_Prompt_OK'>此電話可以使用</span>";
			}else{
				$ret = "<span class='register_Prompt_fail'>此電話已經有人使用</span>";
			}
			echo $ret;
			break;
	}
?>
