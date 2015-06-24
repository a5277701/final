<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>
<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<style type="text/css">

  #productList img{
	width:120px;
	height:120px;
	margin:10px 0px;
	float:left;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border-top-left-radius:5px;
	border-top-right-radius:5px;
	border: solid 5px #724c21 ;
  }
</style>
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

<script language="javascript">
	$(document).ready(function(){
		$('#selectType').change(CollegeToProduct);
		$('#selectProduct').change(ShowIMG);
		$.ajax({
		  url: "defaultLoad.php",
		  type: "POST",
		  data: {selectType: $('#selectType').val()},
		  success: function(data){
				$('#productList').empty();
				$('#productList').append(data);
			}	
		});
		});
	//選產品
	function CollegeToProduct(){	    
		$.ajax({
		  url: "defaultSelect.php",
		  type: "POST",
		  data: {selectType: $('#selectType').val()},
		  success: function(data){
				$('#selectProduct').empty();
				$('#selectProduct').append(data);
			}	
		});
		
		$.ajax({
		  url: "defaultSelect2.php",
		  type: "POST",
		  data: {selectType: $('#selectType').val()},
		  success: function(data){
				$('#productList').empty();
				$('#productList').append(data);
			}	
		});
	};
	//
	function ShowIMG(){	    
		$.ajax({
		  url: "defaultSelect.php",
		  type: "POST",
		  data: {selectProduct: $('#selectProduct').val()},
		  success: function(data){
				$('#productList').empty();
				$('#productList').append(data);
			}	
		});
	};
	function addCar(){
		document.form2.submit()
	}
</script>
</head>
<body>
<div class="container">
  <div  class="content " >
	<h2>產品瀏覽</h2>
	<form name='form1'>
		<select id="selectType">
		<option>請選擇</option>
		  <?php
              include("mysql_connect.inc.php");
              // 動態取得第一階層下拉式選單
              $sql="SELECT * FROM product_type ORDER BY type_no";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_assoc($result)) {
                  echo '<option value="'.$row['type_name'].'">'
                          .$row['type_name']
                      .'</option>'
                      ."\n";};
		  ?>
		</select>
		<select id="selectProduct">
			<option>請先選擇類型</option>
		</select>
        <input type='button' value='加入購物車' onclick='addCar()'>
	</form>
	<hr> 
    <div style=" text-align:center"  >
      <div style=" margin:0 auto; width:980px; 	overflow:scroll;overflow-x:visible; height:700px;" id="productList" class="clearfix"></div>
    </div>
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>