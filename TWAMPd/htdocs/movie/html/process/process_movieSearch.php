<?php
	include("movie.inc.php");
	switch ($_POST['choose']) {
		case "style"://更新類型下拉選單
			$sql = "SELECT * FROM `movie_style`";
			$result = mysql_query($sql);
			$str.= "<option value=''>請選擇</option>";
			while($movie_style = mysql_fetch_array($result)){
				$str.="<option value=".$movie_style[style_name].">".$movie_style[style_name]."</option>";
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
		case "search"://查詢電影
			$select_name = $_POST['select_name'];
			$sql = "SELECT * FROM `movie` WHERE `movie_name` LIKE '%$select_name%' OR `movie_ENname` LIKE '%$select_name%'";
			$result = mysql_query($sql);
			$total_records = mysql_num_rows($result);
			if ( $total_records ==0) {
				$str.="<h1>沒有符合此搜尋條件的電影</h1>";
			}else{
				while($movie = mysql_fetch_array($result)){
					$str.= "<div class='show_cover_list animated zoomIn'>
								<div class='cover_transform'>
									<a class='fancybox overlay' data-fancybox-type='iframe' href='html/process/movieView.php?no=".$movie[movie_no]."'>
										<img src='images/cover/".$movie[movie_no].".jpg' title='".$movie[movie_name]."(".$movie[movie_ENname].")'>
									</a>
								</div>
								<br/>
								<label><input type=checkbox name=chkbx[] value=".$movie[movie_no].">
									".$movie[movie_name]."(".$movie[movie_ENname].")
								</label>
							</div>";
				}
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
		case "page":
			$select_style = $_POST['select_style'];
			$select_level = $_POST['select_level'];
			if ($select_style!=""){//選擇類型
				if($select_level!=""){//選擇分級
					$sql = "SELECT * FROM `movie` WHERE `movie_style` LIKE '%$select_style%' AND `movie_level` = '$select_level'";
				}else{//只有選擇類型
					$sql = "SELECT * FROM `movie` WHERE `movie_style` LIKE '%$select_style%'";
				}
			}else if($select_level!=""){//只有選擇分級
				$sql = "SELECT * FROM `movie` WHERE `movie_level` = '$select_level'";
			}else{//都沒選
				$sql = "SELECT * FROM `movie`";
			}
			$result = mysql_query($sql);
			$total_records = mysql_num_rows($result);
			if ( $total_records ==0) {
				$str.="<h1>沒有符合此搜尋條件的電影</h1>";
			}else{
				while($movie = mysql_fetch_array($result)){
					$str.= "<div class='show_cover_list animated zoomIn'>
								<div class='cover_transform'>
									<a class='fancybox overlay' data-fancybox-type='iframe' href='html/process/movieView.php?no=".$movie[movie_no]."'>
										<img src='images/cover/".$movie[movie_no].".jpg' title='".$movie[movie_name]."(".$movie[movie_ENname].")'>
									</a>
								</div>
								<br/>
								<label><input type=checkbox name=chkbx[] value=".$movie[movie_no].">
									".$movie[movie_name]."(".$movie[movie_ENname].")
								</label>
							</div>";
				}
			}
			mysql_free_result($result);
			mysql_close();
			echo $str;
			break;
/*		case "movie":
			$select_style = $_POST['select_style'];
			$select_level = $_POST['select_level'];
			if ($select_style!=""){//選擇類型
				if($select_level!=""){//選擇分級
					$sql = "SELECT * FROM `movie` WHERE `movie_style` = '$select_style' AND `movie_level` = '$select_level'";
				}else{//只有選擇類型
					$sql = "SELECT * FROM `movie` WHERE `movie_style` = '$select_style'";
				}
			}else if($select_level!=""){//只有選擇分級
				$sql = "SELECT * FROM `movie` WHERE `movie_level` = '$select_level'";
			}else{//都沒選
				$sql = "SELECT * FROM `movie`";
			}
			$result = mysql_query($sql);
				$str.= "<option value=''>請選擇</option>";
				while($movie = mysql_fetch_array($result)){
					$str.="<option value=".$movie[movie_no].">".$movie[movie_name]."(".$movie[movie_ENname].")"."</option>";
				}
				echo $str;
			break;*/
	}
?>