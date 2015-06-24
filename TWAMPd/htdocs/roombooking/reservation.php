<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RoomBooking</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
</head>
<body>
<div class="container clearfix">
<?php
if($_SESSION['name_id'] != null){
	if(isset($_POST["select_room"]) && isset($_POST["select_time"]) && isset($_POST["select_date"])){
    //連接資料庫
	include("roombook.inc.php");

	$id=$_SESSION['name_id'];
	$timeCode="".$_POST["select_room"]."".$_POST["select_time"]."";
	$date=$_POST["select_date"];
	$sql = "SELECT * FROM `record` WHERE `Time_code` = '$timeCode' AND `Date` = '$date';";
	//查詢字串，SELECT敘述，選取name相符欄位
	$result = mysql_query($sql);
	//送出查詢，將結果放入$result
	$sn_index=mysql_num_rows($result);
	//查詢結果的筆數紀錄(rows)
	  if($sn_index > 0){
		  echo "<script language='JavaScript'>window.alert('已被預借！');</script>";;
	  }else{
		  $sql ="SELECT * FROM `record` WHERE `name_id` = '$id' AND `Date` = '$date'";
		  $result = mysql_query($sql);
		  //送出查詢，將結果放入$result
		  $sn_index=mysql_num_rows($result);
		  //查詢結果的筆數紀錄(rows)
		  if($sn_index <2){
			  $sql = "INSERT INTO `record` (`Time_code`, `name_id`, `Date`) VALUES ('$timeCode', '$id', '$date')";
			  $result = mysql_query($sql);
			  echo "<script language='JavaScript'>window.alert('預借成功！');</script>";;
			  echo '<meta http-equiv=REFRESH CONTENT=0;url=management.php>';//跳至預借管理
		  }else{
			  echo "<script language='JavaScript'>window.alert('本日預借額度已滿,下次請早');</script>";
		  }
	  }
	}

}else{
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';//回到首頁
}





?>
  <div style="text-align:center">
  	<div class="content clearfix"> <!--內容-->
   <div class="clearfix" style="float: left; margin-right: 20px;padding:50px 0 0 150px;">
      <img src="background/banner.png" width=600 height=250 border="0" >
    </div>
  </div> 
    <div style="margin:0 auto; width:250px; height:100px">
      <p style="text-align:left; font-size:24px">
      <?php echo $_SESSION['name_id']?><br />
    <?php echo $_SESSION['Name']?> </p></div>
    <div style="margin:0 auto;text-align:left;width:250px; height:300px">
      <form action="reservation.php" method="post" name="form1" >
	  房間： <Select name="select_room">
                <Option  selected >選擇</Option>
                <Option Value="A01">A01</Option>
                <Option Value="A02">A02</Option>
                <Option Value="A03">A03</Option>
                <Option Value="A04">A04</Option>
                <Option Value="A05">A05</Option>
            </Select>
            <br />
      時段: <input type="radio" name="select_time" value="x">9:00~12:00 <br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="select_time" value="y">12:00~15:00 <br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="select_time" value="z">15:00~18:00
           <br>
      日期:<Select name="select_date">
		  <script type="text/javascript">
				 var todayDate= new Date();
				 var myyear=todayDate.getFullYear();
				 var mymonth=todayDate.getMonth()+1;
				 var mydate=todayDate.getDate();
				 var mydateadd1=todayDate.getDate()+1;
				 var mydateadd2=todayDate.getDate()+2;
                 document.write("<option value="+myyear+"/"+mymonth+"/"+mydate+">"+myyear+"/"+mymonth+"/"+mydate+"</Option>");
				 document.write("<option value="+myyear+"/"+mymonth+"/"+mydateadd1+">"+myyear+"/"+mymonth+"/"+mydateadd1+"</Option>");
				 document.write("<option value="+myyear+"/"+mymonth+"/"+mydateadd2+">"+myyear+"/"+mymonth+"/"+mydateadd2+"</Option>");
            </script>
            </Select>
            <br><br />
         <input type="submit"  value="送出">
         <input type="reset" value="清除">
        
        
    </form>
    </table><br>

	
	
</form>
    
  </div>
  </div>
  

</div> <!-- end .container -->
</body>
</html>
