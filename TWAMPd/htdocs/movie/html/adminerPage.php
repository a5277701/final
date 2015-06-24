<?php session_start();
if($_SESSION['competence']!="adminer"){//已登入
	echo '您無權限觀看此頁面!';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=../index.html>';
}else{ ?>

	<script type="text/javascript" src="js/adminerPage.js"></script>
	<!--網頁頁籤_abgne_tab-->
	<link rel="stylesheet" type="text/css" href="css/abgne-block.css">
	<script type="text/javascript" src="js/abgne-block.js"></script>
	<script type="text/javascript" src="js/abgne_tab.js"></script>
	<script type="text/javascript" src="js/jquery.jget.js"></script>
	<style type="text/css">
		/*卷軸呈現*/
		.overf{
			overflow:scroll;overflow-x:visible;	margin:0 auto;width:700px;height:300px;
		}
	</style>
	<div style="height: 50px;">
		<span style="float: left;margin-left:40px;">管理員：<?php echo "".$_SESSION['name'];?></span>
	    <input style="float: right;margin-right:40px;" type="button" value="登出" onclick="if(confirm('確定登出?'))
	      return window.location.replace('html/process/logout.php') ;else return false;">
	</div>
	<!--進入頁籤區塊 載入各種資料表-->
	<?php include("process/movie.inc.php"); ?>
	<div id="abgne-block-20120327">
		<ul class="tabs">
			<li><span>場次</span></li>
			<li><span>電影</span></li>
			<li><span>影廳</span></li>
			<li><span>影城</span></li>
			<li><span>會員</span></li>
		</ul>
		<div class="tab_container">
			<ul class="tab_content">
				<!--movie_order資料表-->
				<li><?php include("process/adminerPage/adminerPage_movie_order.php"); ?></li>
				<!--movie資料表-->
				<li><?php include("process/adminerPage/adminerPage_movie.php"); ?></li>
				<!--movie_hall資料表-->
				<li><?php include("process/adminerPage/adminerPage_movie_hall.php"); ?></li>
				<!--movie_theater資料表-->
				<li><?php include("process/adminerPage/adminerPage_movie_theater.php"); ?></li>
				<!--member資料表-->
				<li><?php include("process/adminerPage/adminerPage_member.php"); ?></li>
			</ul>
		</div>  <!-- end .tab_container -->
	</div> <!-- end .abgne-block-20120327 -->
<?php } ?>