<?php session_start();
if(isset($_SESSION['account'])){//已登入
  switch ($_SESSION['competence']) {
    case "adminer"://回到系統管理員頁面
      header('Location:adminerPage.php');
      break;
    case "member"://回到系統管理員頁面
      header('Location:memberPage.php');
      break;
  }
}else{ ?>
	<script type="text/javascript">
		$(document).ready(function(){
		  $($('input')).keydown(function(event){
		    //偵測Enter
		    if( event.which == 13 ) {
		      Login();
		    }
		  });
				});
		function Login(){//更新電影類型
		  $.ajax({
		    url: "html/process/process_login.php",
		    type: "POST",
		    data: {account: $('#account').val(),
	            password: $('#password').val()
	        },
			dataType: "json",//json是重點!!!!!!
		    success: function(data){
		    	if(data.result == 'OK'){
		    		alert(data.msg);
					$.get(data.page,function(qq){
						$("#iframe").html(qq);
					});
				}else{
					alert(data.msg);
					$("#Prompt").html(data.msg);
				}
		    }
		  });
		};
		function Register(){//更新電影類型
			$.get('html/register.php',function(qq){
				$("#iframe").html(qq);
			});
		};
	</script>
	<div>
		<span>帳號：</span><input type="text" id="account" name="account"><br>
		<span>密碼：</span><input type="password" id="password" name="password"><br>
		<br>
		<input type="button" id="submit" value="登入" onclick="Login();">
		<input type="button" id="submit" value="註冊" onclick="Register();">
	</div>
	<div id="Prompt"></div>
<?php } ?>