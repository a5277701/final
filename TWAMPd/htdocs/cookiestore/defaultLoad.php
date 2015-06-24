<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
		$sql = "SELECT * FROM product_price";
		$pn = mysql_query($sql);
		$str.="<form name='form2' method='post' action='ShoppingCar.php'>";
		while($product = mysql_fetch_array($pn)){
			if($_SESSION["c"]!=0){
				$c=$_SESSION["c"];
				$x=0;//沒重複
				for($i=0;$i < $c ; $i++){
					if($product['pp_no']==$_SESSION['car'][$i]){
						$x=1;//有重複
					};
				};
				if($x==0){//沒重複
						$str.="<div style='width:140px; height:170x; float:left;text-align:left;font-size:8pt;margin-left:17px;'>
						<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product['product_name']."'>
		 				<img src='images/".$product['product_name'].".jpg' title=".$product['product_name']."(".$product['size_name'].")></a>
        				<label><input type=checkbox  name=chkbx[] value=".$product['pp_no'].">".$product['product_name']."(".$product['size_name'].")</label>
						<br/><span style='color:#960'>　 價格:$".$product['price']."</span></div>";		
				}else if($x==1){//有重複
						$str.="<div style='width:140px; height:170x; float:left;text-align:left;font-size:8pt;margin-left:17px;'>
						<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product['product_name']."'>
		 				<img src='images/".$product['product_name'].".jpg' title=".$product['product_name']."(".$product['size_name'].")></a>
        				<label><input type=checkbox checked disabled name=chkbx[] value=".$product['pp_no'].">".$product['product_name']."(".$product['size_name'].")</label>
						<br/><span style='color:#960'>　 價格:$".$product['price']."</span></div>";
				}
			}else{
						$str.="<div style='width:140px; height:170x; float:left;text-align:left;font-size:8pt;margin-left:17px;'>
						<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product['product_name']."'>
		 				<img src='images/".$product['product_name'].".jpg' title=".$product['product_name']."(".$product['size_name'].")></a>
        				<label><input type=checkbox name=chkbx[] value=".$product['pp_no'].">".$product['product_name']."(".$product['size_name'].")</label>
						<br/><span style='color:#960'>　 價格:$".$product['price']."</span></div>";
			}
		}
		$str.="</form>";
		echo $str;


 ?>