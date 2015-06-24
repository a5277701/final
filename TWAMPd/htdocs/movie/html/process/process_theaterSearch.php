<?php
	include("movie.inc.php");
	switch ($_POST['choose']) {
		case "theater"://更新影城下拉選單
			$sql = "SELECT * FROM `movie_theater`";
			$result = mysql_query($sql);
			$str.= "<option value=''>請選擇</option>";
			while($movie_theater = mysql_fetch_array($result)){
				$str.="<option value=".$movie_theater[theater_no].">".$movie_theater[theater_name]."</option>";
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
		case "page"://更新頁面
			$select_theater = $_POST['select_theater'];
			$sql = "SELECT * FROM `movie_theater` WHERE `theater_no` ='$select_theater'";
			$result = mysql_query($sql);
			while($movie_theater = mysql_fetch_array($result)){
				$str.="影城地區：".$movie_theater[theater_place]."";
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
	}
?>
