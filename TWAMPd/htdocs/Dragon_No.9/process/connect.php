<?php session_start();
if($_SESSION['ID']==null){ //
	if($_POST['id']){
		include("Dragon_No.9.inc.php");
		$id = $_POST['id'];
		$pw = $_POST['pw'];

		//搜尋資料庫資料
		$sql = "SELECT * FROM `student` where `ID` = '$id'";
		$result = mysql_query($sql);
		$student = @mysql_fetch_array($result);
		$sql = "SELECT * FROM `adminer` where `ID` = '$id'";
		$result = mysql_query($sql);
		$adminer = @mysql_fetch_array($result);

		if($adminer[ID]==$id && $adminer[password]==$pw){
			$_SESSION['ID'] = $id;
			$_SESSION['name']=$adminer['name'];
		    switch ($adminer['rank']) {
	    	case "adminer":
				$_SESSION['competence']="adminer";
				echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
				echo "<script>parent.window.location.href='../adminerPage.php';</script>";//導向系統管理員頁面
	        	break;
	      	case "clerk":
				$_SESSION['competence']="clerk";
				echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
				echo "<script>parent.window.location.href='../clerkPage.php';</script>";//導向圖書館員頁面
	        	break;
		    }
		}else if($id!=null && $pw!=null && $student[ID]==$id && $student[password]==$pw ){
			$_SESSION['ID'] = $id;
			$_SESSION['name']=$student['name'];
			$_SESSION['competence']="student";
			echo "<script language='JavaScript'>window.alert('".$_SESSION['name']."，您好！');</script>";
			echo "<script>parent.window.location.href='../studentPage.php';</script>";//導向使用者頁面
		}else{
			echo "<script language='JavaScript'>window.alert('登入失敗！');</script>";
			echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
		}
	}else{
		echo "<script language='JavaScript'>window.alert('登入失敗！');</script>";
		echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
	}
}else{
	echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}
?>

