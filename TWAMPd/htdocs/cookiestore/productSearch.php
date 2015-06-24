<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>
<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
</head>
<body>
<?php
$QQ=0;
if (isset($_POST["s_value"])){
//判斷新輸入值是否存在
	include("mysql_connect.inc.php");
	//連接MySQL伺服器
		$s_who=$_POST["s_who"];
		$s_value=$_POST["s_value"];
	$sql = "SELECT * FROM product WHERE $s_who LIKE '%$s_value%';";
	//查詢字串，SELECT敘述，選取name相符欄位
	$result = mysql_query($sql);
	//送出查詢，將結果放入$result
	$sn_index=mysql_num_rows($result);
	//查詢結果的筆數紀錄(rows)

	for($index=0;$index<$sn_index;$index++){
	//設定迴圈，執行一次就將一row的值放入陣列$arr中
		$arr[$index]=mysql_fetch_array($result);
		//取出查詢結果，放入陣列$arr
	};
	if( $sn_index==0){
		$QQ=1;
	}else{ $QQ=2;};
};
?>
<div class="container clearfix">
  <div  class="content clearfix" >
	<h2>產品查詢</h2>
    	<form  action="productSearch.php" method="post">
    	<Select name="s_who">
        	<Option  selected >（任意欄位）</Option>
            <Option Value="product_name">產品名稱</Option>
            <Option Value="type_name">產品類型</Option>
        </Select>
 		<input type="text" name="s_value">        
		<input type="submit" value="送出">
	 	<input type="reset" value="清除">
	</form>
    <hr>
    <?php
	if( !empty($arr)){?>
	  <table align="center" border="5">
        <tr align="center">
          <td width="100px">編號</td>
          <td width="120px">名稱</td>
          <td width="100px">類型</td>
          <td >成份</td>
        </tr>
	<?php
    }else if($QQ==1){
		echo '查無資料';
	};	
    for ($index=0 ; $index < $sn_index ; $index++){
    //設定迴圈，執行一次印出一row
    ?>
        <tr align="center">
          <td><?php echo $arr[$index]['product_no']?></td>
          <td><?php echo $arr[$index]['product_name']?></td>
          <td><?php echo $arr[$index]['type_name']?></td>
          <td align="left"><?php echo $arr[$index]['ingredients']?></td>
        </tr>
    <?php };?>
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>
