<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	if($_SESSION['id'] ==NULL){
		header("refresh:0; url=index.php");
		exit;
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電腦劃位系統</title>
<style type="text/css">
body {
	background-color: #FCC;
	color: #06F;
}
.aa {
	font-weight: bold;
}

</style>
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
			  data: {Movie_seat: $('#Movie_time').val(),Movie_no: $('#Movie_no').val()},
			  success: function(data){
					$('#Movie_seat').empty();
					$('#Movie_seat').append(data);
				}	
			});
		};
	</script>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="aa">Hi ! <span style="color: #006"><?php echo $_SESSION['name'] ?></span> 會員您好 ! </p>
<p class="aa">歡迎使用電影劃位系統</p>
<form name='form1' action="SelcetSeat.php" method="post">
    <p>
	      <select id="Movie_no" name="Movie_no">
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
	      <select id="Movie_time" name="Movie_time">
	        <option>請先選擇電影</option>
      </select>
  </p>
    <p>&nbsp; </p>
	    <div  id="Movie_seat"></div>
	
<p>&nbsp;</p>
<p>
  <input type="button" value="首頁" onclick="javascript:window.open('index.php','_self')">
  <input type="submit" name="give" id="give" value="送出" />
  <input type="button" value="退票" onclick="javascript:window.open('delete.php','_self')">
</p>
</form>
</body>
</html>