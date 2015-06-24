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
		case "hall"://更新影廳下拉選單
			$select_theater = $_POST['select_theater'];
			if ($select_theater!=""){
				$sql = "SELECT * FROM `movie_hall` WHERE `theater_no` LIKE '%$select_theater%'";
				$result = mysql_query($sql);
				$str.= "<option value=''>請選擇</option>";
				while($movie_hall = mysql_fetch_array($result)){
					$str.="<option value=".$movie_hall[hall_no].">".$movie_hall[hall_name]."</option>";
				}
			}else{
				$str.= "<option value=''>請先選擇影城</option>";
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
		case "search"://電影關鍵字查詢場次
			$select_name = $_POST['select_name'];
			$sql = "SELECT * FROM `movie_order` WHERE `movie_no` IN (SELECT movie_no FROM `movie` WHERE `movie_name` LIKE '%$select_name%' OR `movie_ENname` LIKE '%$select_name%') ORDER BY `movie_no`,`start_time`";
			$result = mysql_query($sql);
			$total_records = mysql_num_rows($result);
			if ( $total_records ==0) {
				$str.="<h1>沒有此電影的場次</h1>";
			}else{
				while($movie_order = mysql_fetch_array($result)){
					$sql_movie = "SELECT `movie_name`,`movie_ENname` FROM `movie` WHERE `movie_no` = '$movie_order[movie_no]'";
					$result_movie = mysql_query($sql_movie);
					$movie = mysql_fetch_array($result_movie);
					mysql_free_result($result_movie);

					$sql_hall = "SELECT `hall_name`,`theater_no` FROM `movie_hall` WHERE `hall_no` = '$movie_order[hall_no]'";
					$result_hall = mysql_query($sql_hall);
					$hall = mysql_fetch_array($result_hall);
					mysql_free_result($result_hall);

					$sql_theater = "SELECT `theater_name` FROM `movie_theater` WHERE `theater_no` = '$hall[theater_no]'";
					$result_theater = mysql_query($sql_theater);
					$theater = mysql_fetch_array($result_theater);
					mysql_free_result($result_theater);

					$str.= "<div class='show_order_list animated zoomIn' style='background:url(images/cover/".$movie_order[movie_no].".jpg)'>
								<div class='show_order_list_row row_all'>
									<label><input type=checkbox name=chkbx[] value=".$movie_order[movie_no].">
										<spen class='show_order_list_Info'>
											".$theater[theater_name]."–</spen>".$hall[hall_name]."
											".$movie_order[start_time]."　|　</label>
										<spen class='show_order_list_ShowMovieName'>
											<a class='fancybox overlay' data-fancybox-type='iframe' href='html/process/movieView.php?no=".$movie_order[movie_no]."'>
											".$movie[movie_name]."（".$movie[movie_ENname]."）</a></spen></div></div>";
				}
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
		case "page"://更新頁面
			$select_theater = $_POST['select_theater'];
			$select_hall = $_POST['select_hall'];

			if($select_theater!="" && $select_hall == ""){
				$sql_order = "SELECT * FROM `movie_order` WHERE `hall_no` IN (SELECT `hall_no` FROM `movie_hall` WHERE `theater_no` = '$select_theater') ORDER BY `start_time`,`hall_no`";
				$QQ = "theater";
			}else if($select_theater!="" && $select_hall!=""){
				$sql_order = "SELECT * FROM `movie_order` WHERE `hall_no` = '$select_hall' ORDER BY `start_time`,`hall_no`";
				$QQ = "hall";
			}else if($select_theater=="" && $select_hall == ""){
				$sql_order = "SELECT * FROM `movie_order`";
				$QQ = "all";
			}

			$result = mysql_query($sql_order);
			$total_records = mysql_num_rows($result);
			if ( $total_records ==0) {
				$str.="<h1>暫無場次</h1>";
				mysql_free_result($result);
				mysql_close();
			}else{
				while($movie_order = mysql_fetch_array($result)){
					$sql_movie = "SELECT `movie_name`,`movie_ENname` FROM `movie` WHERE `movie_no` = '$movie_order[movie_no]'";
					$result_movie = mysql_query($sql_movie);
					$movie = mysql_fetch_array($result_movie);
					mysql_free_result($result_movie);

					$sql_hall = "SELECT `hall_name`,`theater_no` FROM `movie_hall` WHERE `hall_no` = '$movie_order[hall_no]'";
					$result_hall = mysql_query($sql_hall);
					$hall = mysql_fetch_array($result_hall);
					mysql_free_result($result_hall);

					$sql_theater = "SELECT `theater_name` FROM `movie_theater` WHERE `theater_no` = '$hall[theater_no]'";
					$result_theater = mysql_query($sql_theater);
					$theater = mysql_fetch_array($result_theater);
					mysql_free_result($result_theater);

					$str.="<div class='show_order_list animated zoomIn' style='background:url(images/cover/".$movie_order[movie_no].".jpg);'>";
					if($QQ == "all"){
						$str.="<div class='show_order_list_row row_all'>
							<label><input type=checkbox name=chkbx[] value=".$movie_order[movie_no].">
							<spen class='show_order_list_Info'>".$theater[theater_name]."–".$hall[hall_name]."　</spen>".$movie_order[start_time]."　|　</label>";
					}else if($QQ == "theater"){
						$str.="<div class='show_order_list_row row_theater'>
							<label><input type=checkbox name=chkbx[] value=".$movie_order[movie_no].">
							<spen class='show_order_list_Info'>".$hall[hall_name]."　</spen>".$movie_order[start_time]."　|　</label>";
					}else if($QQ == "hall"){
						$str.="<div class='show_order_list_row row_hall'>
							<label><input type=checkbox name=chkbx[] value=".$movie_order[movie_no].">
							<spen class='show_order_list_Info'>".$movie_order[start_time]."　|　</spen></label>";
					}
					$str.="<spen class='show_order_list_ShowMovieName'>
							<a class='fancybox overlay' data-fancybox-type='iframe' href='html/process/movieView.php?no=".$movie_order[movie_no]."'>
							".$movie[movie_name]."（".$movie[movie_ENname]."）</a>
							</spen></div></div>";
				}
				mysql_free_result($result);
				mysql_close();
			}
			echo $str;
			break;
	}
?>
