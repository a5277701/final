<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<!--網頁頁籤_abgne_tab-->
<link rel="stylesheet" type="text/css" href="css/abgne-block.css" />
<script type="text/javascript" src="js/abgne-block.js"></script>
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
</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >
  	<?php
	//此判斷為判定觀看此頁有沒有權限
	//說不定是路人或不相關的使用者
	//因此要給予排除
	if($_SESSION['id'] == "mk816017")
	{
	  include("mysql_connect.inc.php");  
	  //將資料庫裡的所有會員資料顯示在畫面上
	  $sql = "SELECT * FROM `member` WHERE `id` = '".$_SESSION['id']."';";
	  $result = mysql_query($sql);
		while($row = mysql_fetch_row($result)){
		  echo "管理員：$row[1]<br><br>";
		}
	}else{
	  echo "<script language='JavaScript'>window.alert('無權限瀏覽此頁面！');</script>";
	  echo "<script>parent.window.location.href='index.php';</script>";;//回到首頁
	}
	?>
      <div id="abgne-block-20120327">
          <ul class="tabs">
              <li><span>會員</span></li>
              <li><span>商品</span></li>
              <li><span>店舖</span></li>
              <li><span>訂單</span></li>
          </ul>
          <div class="tab_container">
              <ul class="tab_content">
                  <li>
                      <h2>會員管理</h2>
                      
                      <?php
					  include("mysql_connect.inc.php");
					  //指定使用cookiestore資料庫
					  $sql = "SELECT * FROM `member`";
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
					?>
                                      
                    <div style="overflow:scroll; overflow-x:visible;margin:0 auto; width:800px; height:500px">
                    <form action="adminer/adminerMember.php" method="post" name="form1">
						  <table align="center" border="1">
							<tr align="center">
							  <td>會員編號</td>
							  <td>姓名</td>
							  <td>生日</td>
							  <td>性別</td>
							  <td>電話</td>
							  <td>電子信箱</td>
							  <td>帳號</td>
							  <td>密碼</td>
							</tr>					
						<?php
						for ($index=0 ; $index < $sn_index ; $index++){
						//設定迴圈，執行一次印出一row
						
						  echo "<tr align='center'>";
                          echo "<td><label><input type=checkbox name=chkM[] value='".$arr[$index]['member_no']."'>".$arr[$index]['member_no']."</label></td>";
						  echo "<td><input type='text' style='width:70px' name='name".$arr[$index]['member_no']."' value='".$arr[$index]['name']."'></td>";
						  echo "<td><input type='text' style='width:100px' name='birthday".$arr[$index]['member_no']."' value='".$arr[$index]['birthday']."'></td>";
						  echo "<td><input type='text' style='width:50px' name='sex".$arr[$index]['member_no']."' value='".$arr[$index]['sex']."'></td>";
						  echo "<td><input type='text' style='width:100px' name='phone".$arr[$index]['member_no']."' value='".$arr[$index]['phone']."'></td>";
						  echo "<td><input type='text' style='width:150px' name='email".$arr[$index]['member_no']."' value='".$arr[$index]['e-mail']."'></td>";
						  echo "<td><input type='text' style='width:80px' name='id".$arr[$index]['member_no']."' value='".$arr[$index]['id']."'></td>";
						  echo "<td><input type='text' style='width:80px' name='code".$arr[$index]['member_no']."' value='".$arr[$index]['code']."'></td>";
						  echo "</tr>";
						};?>
                        </table>
                        <input type="submit" value="會員修改" name="submit" >
                      <input type="submit" value="會員刪除" name="submit" >
                       </form>
                     </div>
                  </li>
                  <li>
                      <h2>商品管理</h2>

                      <?php
					  include("mysql_connect.inc.php");
					  //指定使用cookiestore資料庫
					  $sql = "SELECT * FROM `product`";
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
					?>
                    <div style="overflow:scroll; overflow-x:visible;margin:0 auto; width:800px; height:500px">
                    <form action="adminer/adminerProduct.php" method="post" name="form2">
						  <table align="center" border="1">
							<tr align="center">
							  <td>產品編號</td>
							  <td>產品名稱</td>
							  <td>類型編號</td>
							  <td>產品成份</td>
							</tr>					
						<?php
						for ($index=0 ; $index < $sn_index ; $index++){
						//設定迴圈，執行一次印出一row
						  echo "<tr align='center'>";
                          echo "<td><label><input type=checkbox name=chkP[] value='".$arr[$index]['product_no']."'>".$arr[$index]['product_no']."</label></td>";
						  echo "<td><input type='text' style='width:90px' name='pname".$arr[$index]['product_no']."' value='".$arr[$index]['product_name']."'></td>";
						  echo "<td><input type='text' style='width:70px' name='type".$arr[$index]['product_no']."' value='".$arr[$index]['type_name']."'></td>";
						  echo "<td><input type='text' style='width:400px' name='ingre".$arr[$index]['product_no']."' value='".$arr[$index]['ingredients']."'></td>";
						  echo "</tr>";
						};?>
                        </table>
                      <input type="submit" value="商品修改" name="submit">
                      <input type="submit" value="商品刪除" name="submit" >
                       </form>
                      </div>
                  </li>
                  <li>
                      <h2>店舖管理</h2>
                      <?php
					  include("mysql_connect.inc.php");
					  //指定使用cookiestore資料庫
					  $sql = "SELECT * FROM `store`";
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
					?>
                    <div style="overflow:scroll; overflow-x:visible;margin:0 auto; width:800px; height:500px">
                    <form action="adminer/adminerStore.php" method="post" name="form3">
						  <table align="center" border="1">
							<tr align="center">
							  <td>店鋪編號</td>
							  <td>店鋪名稱</td>
							  <td>店鋪地址</td>
							  <td>店鋪電話</td>
							  <td>負責人</td>
							  <td>負責人電話</td>
							</tr>					
						<?php
						for ($index=0 ; $index < $sn_index ; $index++){
						//設定迴圈，執行一次印出一row
					
						echo "<tr align='center'>";
                        echo "<td><label><input type=checkbox name=chkS[] value='".$arr[$index]['store_no']."'>".$arr[$index]['store_no']."</label></td>";
						echo "<td><input type='text' style='width:70px' name='store_name".$arr[$index]['store_name']."' value='".$arr[$index]['store_name']."'></td>";
						echo "<td><input type='text' style='width:250px' name='store_add".$arr[$index]['store_add']."' value='".$arr[$index]['store_add']."'></td>";
						echo "<td><input type='text' style='width:120px' name='store_phone".$arr[$index]['store_phone']."' value='".$arr[$index]['store_phone']."'></td>";
						echo "<td><input type='text' style='width:70px' name='manager".$arr[$index]['manager']."' value='".$arr[$index]['manager']."'></td>";
						echo "<td><input type='text' style='width:100px' name='manager_phone".$arr[$index]['manager_phone']."' value='".$arr[$index]['manager_phone']."'></td>";
						echo "</tr>";
						 };?>
                        </table>
                      <input type="submit" value="店舖修改" name="submit"  >
                      <input type="submit" value="店舖刪除" name="submit"  >
                       </form>
                     </div>
                  </li>
                  <li>
                      <h2>訂單管理</h2>
                      <?php
					  include("mysql_connect.inc.php");
					  //指定使用cookiestore資料庫
					  $sql = "SELECT * FROM `order`";
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
					?>
                    <div style="overflow:scroll; overflow-x:visible;margin:0 auto; width:800px; height:500px">
                    <form action="adminer/adminerOrder.php" method="post" name="form4">
						  <table align="center" border="1">
							<tr align="center">
							  <td>訂單編號</td>
							  <td>帳號</td>
							  <td>店舖名稱</td>
							  <td>總額</td>
							  <td>取貨日期</td>
							  <td>確認領取</td>
							</tr>					
						<?php
						for ($index=0 ; $index < $sn_index ; $index++){
						//設定迴圈，執行一次印出一row					
						echo "<tr align='center'>";
                        echo "<td><input type=checkbox name=chkO[] value='".$arr[$index]['order_no']."'>
						<a class='fancybox' data-fancybox-type='iframe' href='adminer/OrderView.php?no=".$arr[$index]['order_no']."'>".$arr[$index]['order_no']."</a></td>";
						echo "<td><input type='text' style='width:70px' name='OPid".$arr[$index]['order_no']."' value='".$arr[$index]['id']."'></td>";
						echo "<td><input type='text' style='width:250px' name='store_name".$arr[$index]['order_no']."' value='".$arr[$index]['store_name']."'></td>";
						echo "<td><input type='text' style='width:120px' name='total".$arr[$index]['order_no']."' value='".$arr[$index]['total']."'></td>";
						echo "<td><input type='text' style='width:70px' name='pickup_date".$arr[$index]['order_no']."' value='".$arr[$index]['pickup_date']."'></td>";
						echo "<td><input type='text' style='width:100px' name='check".$arr[$index]['order_no']."' value='".$arr[$index]['check']."'></td>";
						echo "</tr>";
						 };?>
                        </table>
                      <input type="submit" value="訂單修改" name="submit" >
                      <input type="submit" value="訂單刪除" name="submit" >
                       </form>
                     </div>
                  </li>
              </ul>
          </div>  <!-- end .tab_container -->
      </div> <!-- end .abgne-block-20120327 -->
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>