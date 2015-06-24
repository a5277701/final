<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#Movie_no').change(CollegeToTime);
			$('#Movie_time').change(CollegeToSeat);
			});
		選場次(廳別)
		function CollegeToTime(){	    
			$.ajax({
			  url: "./process/index.php",
			  type: "POST",
			  data: {Movie_no: $('#Movie_no').val()},
			  success: function(data){
					$('#Movie_time').empty();
					$('#Movie_time').append(data);
				}	
			});
		};
		//選座位
		function CollegeToSeat(){	    
			$.ajax({
			  url: "./process/index.php",
			  type: "POST",
			  data: {Movie_seat: $('#Movie_time').val()},
			  success: function(data){
					$('#Movie_seat').empty();
					$('#Movie_seat').append(data);
				}	
			});
		};
	</script>
<body>

	<form name='form1'>
		<select id="Movie_no">
		<option>請選擇</option>
		<?php
			include("mysql_connect.inc.php");
			$sql="select * from movie";
			$mn=mysql_query($sql);
			while($movie =mysql_fetch_array($mn)){ ?>
				<option value="<?php echo $movie["Movie_no"]; ?>" <?php if($Movie_no==$movie["Movie_no"]){echo " selected";} ?> >
				<?php echo $movie["Movie_name"]; ?></option>
			<?php
			};
			?>
		</select>
		<select id="Movie_time">
			<option>請先選擇電影</option>
		</select>
		<div id="Movie_seat"></div>
	</form>
</body>
</html>