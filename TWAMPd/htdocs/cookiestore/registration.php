<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CookieStore</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>

<script src="js/aj-birthday.js" type="text/javascript"></script>
<script type="text/javascript"> 
	$(function () {
		$('.birthday-zone').ajbirthday({ year: 1993, month: 1, day: 1});
	});
</script>
<script type="text/javascript"> 
	function checkRegAcc(){
	  if ($('#account').val().length >=1) {
	  $.ajax( {
      url: 'chk_id.php',
      type: 'POST',
      data: {
        id: $('#account').val()
      },
      error: function(xhr) {
        alert('Ajax request 發生錯誤');
      },
      success: function(response) {
          $('#msg_user_name').html(response);
          $('#msg_user_name').fadeIn();
 
      }
    } );
        }else{
            $('#msg_user_name').html('');
        }
    };
	function checkRegPhone(){
		
	  if ( document.form1.new_phone.value.match(/^09[0-9]{8}$/) ) {
	  $.ajax( {
      url: 'chk_phone.php',
      type: 'POST',
      data: {
        id: $('#phone').val()
      },
      error: function(xhr) {
        alert('Ajax request 發生錯誤');
      },
      success: function(response) {
          $('#msg_user_phone').html(response);
          $('#msg_user_phone').fadeIn();
 
      }
    } );
        }else{
            $('#msg_user_phone').html("<span style='color:red'> 請輸入正確格式</span>");
        }
    };
	function checkRegMail(){
	  var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
	  if( emailReg.test(document.form1.new_mail.value) ){
	  $.ajax( {
      url: 'chk_mail.php',
      type: 'POST',
      data: {
        id: $('#mail').val()
      },
      error: function(xhr) {
        alert('Ajax request 發生錯誤');
      },
      success: function(response) {
          $('#msg_user_mail').html(response);
          $('#msg_user_mail').fadeIn();
 
      }
    } );
        }else{
            $('#msg_user_mail').html("<span style='color:red'> 請輸入正確格式</span>");
        }
    };
  function checkdata() {
	if   (document.form1.new_name.value.length   ==   0)   {  
		alert("請輸入您姓名!");
		document.form1.new_name.focus();
		return   false;
	}
	if   (document.form1.b_year.value   ==   0)   {  
		alert("請選擇年!");
		document.form1.b_year.focus();
		return   false;
	}
	if   (document.form1.b_month.value   ==   0)   {  
		alert("請選擇月!");
		document.form1.b_month.focus();
		return   false;
	}
	if   (document.form1.b_day.value   ==   0)   {  
		alert("請選擇日!");
		document.form1.b_day.focus();
		return   false;
	}	
	if   (document.form1.new_sex.value.length   ==   0)   {  
		alert("請選擇您性別!");
		document.form1.new_sex.focus();
		return   false;
	}
	if ( !document.form1.new_phone.value.match(/^09[0-9]{8}$/) ){
	  alert( "手機不可空白!\n長度必須是10，\n不可以是文字，\n必定要09帶頭。")
	  document.form1.new_phone.focus();
	  return false;
	}	
	//var emailReg = /^[_a-z0-9]+@([_a-z0-9]+\.)+[a-z0-9]{2,3}$/;
	var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
	if( emailReg.test(document.form1.new_mail.value) ){
	}else{
		alert("您輸入的Email地址格式不正確！");
		document.form1.new_mail.focus();
		return false;
	}
	if   (document.form1.new_id.value.length   ==   0)   {  
		alert("請輸入您帳號!");
		document.form1.new_id.focus();
		return   false;
	}
	if   (document.form1.new_code.value.length   ==   0)   {  
		alert("請輸入您密碼!");
		document.form1.new_code.focus();
		return   false;
	}
	if   (document.form1.new_code1.value.length   ==   0)   {  
		alert("請驗證您密碼!");
		document.form1.new_code1.focus();
		return   false;
	}
	if( document.form1.new_code.value != document.form1.new_code1.value)   {  
		alert("您兩次輸入的密碼不一樣！請重新輸入.");
		document.form1.new_code.focus();
		return   false;
	}
	document.form1.submit()
  }
</script>

</head>
<body>
<div class="container clearfix">
  <div class="content clearfix" >

    請將資料輸入完整後按下註冊按鈕<br><br>
    <form action="registration_chk.php" method="post" name="form1">
      姓　　名：<input type="text" name="new_name"><br />
      <div class="birthday-zone">
      生　　日：<select name="b_year" class="year">
            <option Value=0>請選擇</option>
           </select>
           <select name="b_month" class="month">
            <option Value=0>請選擇</option>
           </select>
           <select name="b_day" class="day">
            <option Value=0>請選擇</option>
           </select>
      </div>
	  性　　別：<input type="radio" name="new_sex" value="男">男
           <input type="radio" name="new_sex" value="女">女<br />
      電　　話：<input type="text" name="new_phone" id="phone" onchange="checkRegPhone()"><span id="msg_user_phone"></span><br />
      信　　箱：<input type="text" name="new_mail" id="mail" onchange="checkRegMail()"><span id="msg_user_mail"></span><br />
      帳　　號：<input type="text" name="new_id" id="account" onchange="checkRegAcc()"><span id="msg_user_name"></span><br />
      密　　碼：<input type="password" name="new_code"><br />
      確認密碼：<input type="password" name="new_code1"><br />
         <input type="button" value="註冊" name="button1" onclick="checkdata()">
         <input type="reset" value="清除">
    </form>
  </div> <!-- end .content -->
</div> <!-- end .container -->
</body>
</html>