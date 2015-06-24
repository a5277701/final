<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>讀書空間預借系統-查詢頁面</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#select_date').change(ChangeToTime);
				$('#select_time').change(ChangeToDesk);
			});
			function ChangeToTime(){
				$.ajax({
					url:"process/process_search.php",
					type:"POST",
					data:{select_date: $('#select_date').val(),choose:"date"},
					success: function(data){
						$('#select_time').empty();
						$('#select_time').append("<option value=''>請選擇</option>")
						$('#select_time').append(data);
						$('#show_desk').empty();
					}
				});
			};
			function ChangeToDesk(){
				$.ajax({
					url:"process/process_search.php",
					type:"POST",
					data:{select_date: $('#select_date').val(),select_time: $('#select_time').val(),choose:"time"},
					success: function(data){
						$('#show_desk').empty();
						$('#show_desk').append(data);
					}
				});
			};
		</script>
	</head>
	<body>
	<div class="container">
		<div class="content">
			<img src="images/background/banner.png" width="600" height="250" border="0" >
			<div style="margin:10 auto 0 auto;text-align:left;width:250px; height:50px;">
				<span style="padding-left:50px">日期：</span>
				<select id="select_date" name="select_date">
				<?php
					$limit=mktime(18,00,0,date("m"),date("d"),date("Y"));
					$now=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
					echo '<option value="" >請選擇</option>';
					if($now>=$limit){
						for($i=0;$i<=3;$i++){
							echo '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
					}else{
						for($i=0;$i<=2;$i++){
							echo '<option value="'.date('Y-m-d',time()+(24*60*60*$i)).'">'.date('Y-m-d',time()+(24*60*60*$i)).'</option>';}
					}
				?>
				</select><br>
				<span style="padding-left:50px">時段：</span>
				<select id="select_time" name="select_time">
					<option value="">請先選擇日期</option>
				</select><br>
			</div>
			<div style="margin:0 auto;text-align:center ;width:450px;">
				<div id="show_desk"></div><br>
				<input type="button" value="回前頁" onclick="history.go(-1)">
			</div>
		</div> <!-- end .content -->
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>
