<?php session_start();
	include("movie.inc.php");
	$name = $_POST['uName'];
	$birthday="".$_POST["b_year"]."-".$_POST["b_month"]."-".$_POST["b_day"]."";
	$sex=$_POST["sex"];
	$email=$_POST["mail"];
	$phone=$_POST["phone"];
	$account = $_POST['account'];
	$pass = $_POST['password'];
	$password = md5($pass);
/*	echo "姓名".$name;
	echo "生日".$birthday;
	echo "性別".$sex;
	echo "信箱".$email;
	echo "電話".$phone;
	echo "帳號".$account;
	echo "密碼".$pass;
	echo "md5".$password;*/
  	if($name != null && $birthday != null && $sex != null && $email != null && $phone != null && $account != null && $pass != null){
		$sql = "SELECT * FROM `member` WHERE `member_phone` = '$phone' OR `member_e-mail` = '$email' OR `member_account` = '$account';";
		//查詢字串，SELECT敘述，查詢手機信箱及帳號是否重複
		$result = mysql_query($sql);
		//送出查詢，將結果放入$result
		$sn_index=mysql_num_rows($result);
		if($sn_index==0){ //沒有重複
			$sql = "INSERT INTO `member` (`member_name`, `member_birthday`, `member_sex`, `member_e-mail`, `member_phone`, `member_account`, `member_password`, `member_pass`)
				VALUES ('$name', '$birthday', '$sex', '$email', '$phone', '$account', '$password', '$pass');";
	  		//設定查詢字串，將輸入的值新增至資料表
	  		mysql_query($sql);
			mysql_free_result($result);
			mysql_close();
			//echo $sql;
			$result=array("result"=>"OK","msg"=>"註冊成功");
			echo json_encode($result);
	  		// echo "<script language='JavaScript'>window.alert('註冊成功！轉跳登入頁面');</script>";
	  		// echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
		}else{
			$result=array("result"=>"fail","msg"=>"重複註冊！");
			echo json_encode($result);
	  	// echo "<script language='JavaScript'>window.alert('重複註冊！');</script>";
	 	// echo '<meta http-equiv=REFRESH CONTENT=0;url=register.php>';
		}
  	}else if($_SESSION['account']!= null){
		echo '你已經登入了，無須註冊';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=../../index.html>';
  	}else{
		echo '您無權限觀看此頁面!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=../../index.html>';
  	}
?>
