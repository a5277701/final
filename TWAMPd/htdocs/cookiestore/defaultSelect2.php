<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
  if($_REQUEST['selectType']!=""){
	$a = $_REQUEST['selectType'];
	$sql = "SELECT product_name FROM product WHERE type_name = '{$a}' order by product_no asc";
	$result = mysql_query($sql);//送出查詢，將結果放入$result
	$sn_index=mysql_num_rows($result);//查詢結果的筆數紀錄(row
	for($index=0;$index<$sn_index;$index++){
	  $product[$index]=mysql_fetch_array($result);
	  //取出查詢結果，放入陣列$arr
	};
	$str.="<form name='form2' method='post' action='ShoppingCar.php'>";
	for($index=0;$index<$sn_index;$index++){
	  $sql2 = "SELECT * FROM product_price WHERE product_name = '".$product[$index]['product_name']."' order by pp_no asc";
	  $pn = mysql_query($sql2);
	  		while($product2 = mysql_fetch_array($pn)){
			if($_SESSION["c"]!=0){
				$c=$_SESSION["c"];
				$x=0;//沒重複
				for($i=0;$i < $c ; $i++){
					if($product2['pp_no']==$_SESSION['car'][$i]){
						$x=1;//有重複
					};
				};
				if($x==0){//沒重複
					$str.="<div style='width:140px; height:200px;float:left;text-align:left;font-size:8pt;margin-left:17px;'>
					<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product2['product_name']."'>
					<img src='images/".$product2['product_name'].".jpg' title=".$product2['product_name']."(".$product2['size_name'].")></a>
					<br/><label><input type=checkbox name=chkbx[] value=".$product2['pp_no'].">".$product2['product_name']."(".$product2['size_name'].")</label>
					<br/><span style='color:#960'>　 價格:$".$product2['price']."</span></div>";
				}else if($x==1){//有重複
					$str.="<div style='width:140px; height:200px;float:left;text-align:left;font-size:8pt;margin-left:17px;'>
					<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product2['product_name']."'>
					<img src='images/".$product2['product_name'].".jpg' title=".$product2['product_name']."(".$product2['size_name'].")></a>
					<br/><label><input type=checkbox checked disabled name=chkbx[] value=".$product2['pp_no'].">".$product2['product_name']."(".$product2['size_name'].")</label>
					<br/><span style='color:#960'>　 價格:$".$product2['price']."</span></div>";
				}
			}else{
					$str.="<div style='width:140px; height:200px;float:left;text-align:left;font-size:8pt;margin-left:17px;'>
					<a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product2['product_name']."'>
					<img src='images/".$product2['product_name'].".jpg' title=".$product2['product_name']."(".$product2['size_name'].")></a>
					<br/><label><input type=checkbox name=chkbx[] value=".$product2['pp_no'].">".$product2['product_name']."(".$product2['size_name'].")</label>
					<br/><span style='color:#960'>　 價格:$".$product2['price']."</span></div>";
			}
		}		
	};
	$str.="</form>";
	echo $str;
  };

 ?>