<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>



<?
	include("roombook.inc.php");
	 $sql = "SELECT * FROM record";
        $result = mysql_query($sql);

        while($row = mysql_fetch_row($result))
        {	
            echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td>" ;
            echo "<td><input type='text' value='0' name='$row[1]' size='3'></td></tr>";
        }

?>










<body>
</body>
</html>