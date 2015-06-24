<?php session_start();
if($_SESSION['competence']!="student"){//非學生
	echo "<script language='JavaScript'>history.go(-1)</script>";//回前頁
}else{ ?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>讀書空間預借系統-預借頁面</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				ChangeToDate();
				$('#select_date').change(ChangeToTime);
				$('#select_time').change(ChangeToDesk);
			});
			function ChangeToDate(){
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),choose:"date"},
					success: function(data){
						$('#select_date').empty();
						$('#select_date').append(data);
						$('#select_time').empty();
						$('#select_time').append("<option value=''>請先選擇日期</option>");
						$('#select_desk').empty();
						$('#select_desk').append("<option value=''>請先選擇時段</option>")
					}
				});
			};
			function ChangeToTime(){
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),choose:"time"},
					success: function(data){
						$('#select_time').empty();
						$('#select_time').append(data);
						$('#select_desk').empty();
						$('#select_desk').append("<option value=''>請先選擇時段</option>")
					}
				});
			};
			function ChangeToDesk(){
				$.ajax({
					url: "process/process_reservation.php",
					type: "POST",
					data: {select_date: $('#select_date').val(),select_time: $('#select_time').val(),choose:"desk"},
					success: function(data){
						$('#select_desk').empty();
						$('#select_desk').append(data);
					}
				});
			};
		</script>
	</head>
	<body>
	<div class="container">
		<div class="content">
			<img src="images/background/banner.png" width="600" height="250" border="0" >
			<div style="margin:0 auto;text-align:left; width:250px; height:80px">
				<p style="text-align:left; font-weight:bold;">
				<span style="font-size:20px"><?php echo $_SESSION['ID'] ?></span><br>
				<span style="font-size:24px"><?php echo $_SESSION['name'] ?></span></p>
			</div>
			<div style="margin:0 auto;text-align:left;width:250px; height:300px">
				<form name="form1" action="process/process_reservation.php" method="post">
					<span>日期：</span>
					<select id="select_date" name="select_date"></select><br>
					<span>時段：</span>
					<select id="select_time" name="select_time"></select><br>
					<span>座位：</span>
					<select id="select_desk" name="select_desk"></select><br>
					<br><br>
					<input type="submit" value="預借申請">
					<input type="button" value="全部清除" onclick="ChangeToDate()">
					<input type="button" value="回前頁" onclick="history.go(-1)">
				</form>
			</div>
		</div>
	</div> <!-- end .container -->
	</body>
	</html>
<?php } ?>