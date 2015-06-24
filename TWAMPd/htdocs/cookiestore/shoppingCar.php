<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>
<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<!--燈箱效果_fancybox-->
<!-- Add fancyBox main JS and CSS files -->
<link rel="stylesheet" type="text/css" href="css/fancybox/fancybox.css" />
<script type="text/javascript" src="js/fancybox/fancybox.js"></script>
<!-- Add mousewheel plugin (this is optional) --> 
<script type="text/javascript" src="js/fancybox/mousewheel-3.0.6.pack.js"></script>
<!-- Add Button helper (this is optional)  -->
<link rel="stylesheet" type="text/css" href="css/fancybox/helpers/fancybox-buttons.css" />
<script type="text/javascript" src="js/fancybox/helpers/fancybox-buttons.js"></script>
<!-- Add Thumbnail helper (this is optional) --> 
<link rel="stylesheet" type="text/css" href="css/fancybox/helpers/fancybox-thumbs.css" />
<script type="text/javascript" src="js/fancybox/helpers/fancybox-thumbs.js"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="js/fancybox/helpers/fancybox-media.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".fancybox").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		helpers		: {
			title	: { type : 'inside' },
		}
	});
});
</script>

<script type="text/javascript">
	 function ValidateNumber(e, pnumber){

	if (!/^\d+$/.test(pnumber)){
		$(e).val(/^\d+/.exec($(e).val()));
	}
	return false;

	}
 function calculate(Q,N){
	 var qN="q"+N;
	 var price=document.getElementById(N);
	 var dataset=price.dataset;
	 var pp=parseFloat(dataset.price);

	 if(Q<1){
		 document.getElementById(N).value=1;
		 document.getElementById(qN).textContent=1*pp;
		  var total=0;
		 for(var i=0; i<<?php echo $_SESSION['c'] ?> ; i++){ 
		 	var qN="q"+i;
		   total=total+parseInt(document.getElementById(qN).textContent);
		 }
		 document.getElementById('total').textContent=total;
		 document.getElementById('total1').value=total;
	 }else{
		  var total=0;
	     document.getElementById(qN).textContent=Q*pp;
		 for(var i=0; i<<?php echo $_SESSION['c'] ?> ; i++){ 
		 	var qN="q"+i;
		   total=total+parseInt(document.getElementById(qN).textContent);
		 }
		 document.getElementById('total').textContent=total;
		 document.getElementById('total1').value=total;
	 }
 }
</script>
<?php
if(isset($_POST["submit"])){
	if($_POST["submit"]=="刪除"){
		$a=$_POST['chkbx1'];
		$c=$_SESSION['c'];
		for ($i=0;$i<count($a);$i++) { //以迴圈將核取值存入$_SESSION['car']陣列
			for($j=0;$j<$c;$j++){
				if($a[$i]==$_SESSION['car'][$j]){
					unset($_SESSION['car'][$j]);
				};
			};			
		};
		$_SESSION['car'] = array_values($_SESSION['car']); //重整陣列
		$car=$_SESSION['car']; 
		$_SESSION['c']=count($car); //紀錄新筆數
		echo '<meta http-equiv=REFRESH CONTENT=0;url=shoppingCar.php>';
	}else if($_POST["submit"]=="送出所有"){
		if($_SESSION['id']==NULL){
			echo "<script language='JavaScript'>window.alert('請先登入！');</script>";
		}else if($_SESSION['c']==0){
			echo "<script language='JavaScript'>window.alert('尚無購物車清單！');</script>";
		}else if($_POST['selectStore']==NULL){
			echo "<script language='JavaScript'>window.alert('請選擇店家！');</script>";
		}else{
			include("mysql_connect.inc.php");
  			//連接資料庫，只要此頁面上有用到連接MySQL就要include它
  			$id=$_SESSION['id'];
  			$store=$_POST['selectStore'];
  			$sql = "INSERT INTO `order` (`id`, `store_name`, `total` , `pickup_date`, `check`) VALUES ('$id', '$store', '".$_POST['total1']."'  , now(), 2);";
  			//查詢字串，SELECT敘述，選取name相符欄位
  			mysql_query($sql);
			$sql = "SELECT order_no FROM `order` ORDER BY `order_no` DESC LIMIT 0,1";
			$result = mysql_query($sql);
			$record=mysql_fetch_array($result);
  			//送出查詢，將結果放入$result
			$oN=$record['order_no'];
			$c=$_SESSION['c'];
			for($j=0;$j<$c;$j++){
				$ppNo=$_SESSION['car'][$j];
				$q=$_POST[$j];
				$sql3 = "INSERT INTO `order_content` (`order_no`, `pp_no`, `quantity`) VALUES ('$oN', '$ppNo', '$q');";
				if(mysql_query($sql3)){
					unset ($_SESSION['car'][$j]);
				};
			};
			$car=$_SESSION['car'];
			if(count($car)==0){
				unset ($_SESSION['c']);
				echo "<script language='JavaScript'>window.alert('訂單成功！編號:".$oN."');</script>";
			}
			
		}
	}
	

}
	
?>
</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >
  	<h2 align='center'>購物車清單</h2>
    <?php
	include("mysql_connect.inc.php");
	if ($_SESSION["c"]==NULL) { //如果購物車沒資料 筆數設置為0
   		$_SESSION["c"]=0;
	  }
	$c=$_SESSION["c"];
	$total=0;
	echo "<form id='form1' name='form1' method='post' action=''>";
	echo "<table align='center' border='0'>";
	echo "<tr align='center' bgcolor='#FFFF99'>
			<td></td>
			<td>商品名稱</td>
			<td width='50px'>尺寸</td>
			<td width='50px'>價格</td>
			<td>數量</td>
			<td width='100px'>總價</td>
		  </tr>";
	for ($i=0;$i< $c;$i++) {
	  $sql = "SELECT * FROM product_price WHERE pp_no ='".$_SESSION['car'][$i]."';";
	  //查詢字串，SELECT敘述，選取name相符欄位
	  $result = mysql_query($sql);
	  //送出查詢，將結果放入$result
	  $product=mysql_fetch_array($result);
	  $FN=$i+1;
	  echo "<tr bgcolor='#fff'>";
	  echo "<td><label><input type=checkbox name=chkbx1[] value=".$product['pp_no'].">".$FN."、</label></td>";
	  echo "<td><a class='fancybox' data-fancybox-type='iframe' href='productView.php?no=".$product['product_name']."'>".$product['product_name']."</a></td>";
	  echo "<td>".$product['size_name']."</td>";
	  echo "<td><span id='p".$i."' name='p".$i."'>".$product['price']."</td>";
	  echo "<td><input type='text' name='".$i."' id='".$i."' value='1' size='2' maxlength='2' style='width:50px' data-price='".$product['price']."' onkeyup='return ValidateNumber($(this),value) ,calculate(this.value,this.id)'></td>";
	  echo "<td><span id='q".$i."' name='q".$i."'>".$product['price']."</span></td>";
	  echo "</tr>";
	  $total=$total+$product['price'];
	};

	if(isset($_POST['chkbx'])){ //有核取值
	  	  $c=$_SESSION["c"];
	  $a=$_POST['chkbx'];
	  for ($i=0;$i<count($a);$i++) { //以迴圈將核取值存入$_SESSION['car']陣列
		  $_SESSION['car'][$c]=$a[$i];
		  $sql = "SELECT * FROM product_price WHERE pp_no ='".$_SESSION['car'][$c]."';";
	  		//查詢字串，SELECT敘述，選取name相符欄位
	  		$result = mysql_query($sql);
	  		//送出查詢，將結果放入$result
	  		$product=mysql_fetch_array($result);
	 		echo "<tr bgcolor='#FF9900'>";
			$FN=$c+1;
	  		echo "<td><label><input type=checkbox name=chkbx1[] value=".$product['pp_no'].">".$FN."、</label></td>";
	  		echo "<td>".$product['product_name']."</td>";
	  		echo "<td>".$product['size_name']."</td>";
	 		echo "<td>".$product['price']."</td>";
			echo "<td><input type='text' name='quantity' value='1' style='width:50px'></td>";
			echo "<td><label for='quantity'>".$product['price']."</label></td>";
			echo "</tr>";
		  $c++;
	  };	    
	  $_SESSION["c"]=$c; //紀錄購物車筆數
	  $isadd=1;
	};
	if($isadd==1){
	  $isadd=0;
	  echo "<script language='JavaScript'>window.alert('加入成功！');</script>";
	  echo '<meta http-equiv=REFRESH CONTENT=0;url=default.php>';//回到登入頁面
	}else{
		echo "<tr>";
	  echo "<div style='text-align:center;'>";
	  echo "<div style='margin:0 auto; witdh:500px;'>";	
	  echo "<select id='selectStore' name='selectStore'>";
	  echo "<option value=''>請選擇店舖</option>";
              $sql="SELECT * FROM store ORDER BY store_no";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_assoc($result)) {
                  echo '<option value="'.$row['store_name'].'">'
                          .$row['store_name']
                      .'</option>'
                      ."\n";};
	  echo "</select>";
	  echo "<input name='submit' type='submit' value='送出所有'>";
	  echo "</div>";
	  echo "</div>";
	  echo "<td><input name='submit' type='submit' value='刪除'></td><td></td><td></td><td></td><td>
	  		<span style='color:rgb(255,102,0)'>total:</span></td>";
	  echo "<td><span id='total' name='total' style='color:rgb(255,102,0)'>".$total."</span></td>";
	   echo "<td><input type='hidden' id='total1' name='total1' value='".$total."'>.</td>";
	  echo "</tr>";
	  echo "<hr/>";		 
	  echo "</table>";
	  echo "</form>";
	}
  
	?>
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>
