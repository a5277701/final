<?php session_start();
if($_SESSION['account']==null){ //還未登入
	if($_POST['account']!=""){
		include("movie.inc.php");
		$account = $_POST['account'];
		$pass = $_POST['password'];
		$password =md5($pass);
		//搜尋資料庫資料
		$sql = "SELECT * FROM `adminer` where `adminer_account` = '$account'";
		$result = mysql_query($sql);
		$adminer = mysql_fetch_array($result);//找出ID相符的管理員
		mysql_free_result($result);
		$sql = "SELECT * FROM `member` where `member_account` = '$account'";
		$result = mysql_query($sql);
		$member = mysql_fetch_array($result);//找出ID相符的會員
		mysql_free_result($result);
		if($adminer[adminer_account]==$account && $adminer[adminer_password]==$password){//如果帳密符合管理員
			$_SESSION['account'] = $account;//記錄ID
			$_SESSION['name']=$adminer[adminer_name];//記錄name
		    switch ($adminer['adminer_rank']) {//判斷身分
		    	case "adminer"://是系統管理員
					$_SESSION['competence']="adminer";//記錄身分
					$str.="<p>歡迎".$adminer[adminer_name]."</p>";
					$result=array("result"=>"OK","page"=>"html/adminerPage.php","msg"=>"".$_SESSION['name']."，您好！");
					echo json_encode($result);
		        	break;
		    }
		}else if($account!=null && $pass!=null && $member[member_account]==$account && $member[member_password]==$password ){//如果帳密不為空且符合會員
			$_SESSION['account'] = $account;//記錄ID
			$_SESSION['name']=$member[member_name];//記錄name
			$_SESSION['competence']="member";//記錄身分
			$result=array("result"=>"OK","page"=>"html/memberPage.php","msg"=>"".$_SESSION['name']."，您好！");
			echo json_encode($result);
		}else{
			$result=array("result"=>"fail","msg"=>"帳密錯誤!");
			echo json_encode($result);
		}
	}else{
		$result=array("result"=>"fail","msg"=>"請輸入帳號!");
		echo json_encode($result);
	}
}else{
	echo '您無權限觀看此頁面!';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=../../index.html>';
	// echo "<script language='JavaScript'>history.go(-1);</script>";//回前頁
}
?>

