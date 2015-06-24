<script type="text/javascript">
	function logout(){//更新電影類型
	  $.ajax({
	    url: "html/process/logout.php",
	    success: function(){
	    	alert("登出成功!");
			$.get('html/login.php',function(qq){
				$("#iframe").html(qq);
			});
	    }
	  });
	};
</script>
<p>會員頁面</p>
<a onclick="logout();" target="html/login.php">登出</a>