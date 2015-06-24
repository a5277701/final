<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退票</title>
<script>
function del(id) {
	
	alert ('刪除流水號'+id+'?');
	 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  alert ("刪除成功")
    }
  }
  xmlhttp.open("GET","delete_check.php?del="+id,true);
  xmlhttp.send();

}

</script>
</head>

<body>
<div id="txtHint">
<form action="delete_check.php" method="post">
<table border="2">  
<tr>
	<th>訂票流水號</th>
    <th>電影編號</th>
    <th>時間編號</th>
     <th>座位編號</th>
      <th></th>
</tr>
<?php
	include("mysql_connect.inc.php");
	$sql="select * from mark";
	$mn=mysql_query($sql);
	while($a=mysql_fetch_array($mn)){ 
		echo "<tr>";
		echo "<td>".$a["Mark_no"]."</td>";
		echo "<td>".$a["Movie_no"]."</td>";
		echo "<td>".$a["Time_no"]."</td>";
		echo "<td>".$a["Seat_no"]."</td>";	
		echo "<td><input id='".$a["Mark_no"]."' type='button' onclick='del(this.id);' value='刪除'/></td>";	
		echo "</tr>";
	}
			
?>
</table>
</form>
</div>
<br  />
<a href="Mark.php">返回訂票</a>
</body>
</html>