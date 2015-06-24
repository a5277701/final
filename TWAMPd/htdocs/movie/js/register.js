$(function () {
	$('.birthday-zone').ajbirthday({ year: 1993, month: 1, day: 1});
});

function Register(){
	$.ajax({
	  url: "html/process/process_register.php",
	  type: "POST",
	  data: {
	  		uName: $('input[name="uName"]').val(),
	  		b_year: $('select[name="b_year"]').val(),
	  		b_month: $('select[name="b_month"]').val(),
	  		b_day: $('select[name="b_day"]').val(),
	  		sex: $('input:radio:checked[name="sex"]').val(),
	  		mail: $('input[name="mail"]').val(),
	  		phone: $('input[name="phone"]').val(),
	        account: $('input[name="account"]').val(),
	        password: $('input[name="password"]').val()
	    },
		dataType: "json",//json是重點!!!!!!
	    success: function(data){
	    	if(data.result == 'OK'){
	    		//將XX include div#iframe
	    		alert(data.msg);
				$.get('html/login.php',function(qq){
					$("#iframe").html(qq);
				});
			}else if(data.result == 'fail'){
				//$("#Prompt").html(data.result);
				alert(data.msg);
			}
	    }
	});
};

function checkRegAcc(){
	var accountReg=/\s+/g;
	if ($("input[name='account']").val().length >=6 && !accountReg.test($("input[name='account']").val())) {
		$.ajax({
			url: "html/process/register_chk.php",
			type: "POST",
			data: {
				account: $('input[name="account"]').val(),
				choose:"account"
			},
			error: function(xhr) {
				alert("Ajax request 發生錯誤");
			},
			success: function(response) {
				$("#msg_user_account").html(response);
				$("#msg_user_account").fadeIn();
  			}
		});
    }else{
        $('#msg_user_account').html("<span class='register_Prompt_fail'>&gt;6 & not blank</span>");
    }
};

function checkRegMail(){
	var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
	if (emailReg.test($('input[name="mail"]').val())) {
		$.ajax( {
			url: 'html/process/register_chk.php',
			type: 'POST',
			data: {
				mail: $('input[name="mail"]').val(),
				choose:"mail"
			},
			error: function(xhr) {
				alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				$('#msg_user_mail').html(response);
				$('#msg_user_mail').fadeIn();
  			}
		});
    }else{
        $('#msg_user_mail').html("<span class='register_Prompt_fail'>EX: xx@xx.xx</span>");
    }
};
function checkRegPhone(){
	if ($('input[name="phone"]').val().match(/^09[0-9]{8}$/)) {
		$.ajax( {
			url: 'html/process/register_chk.php',
			type: 'POST',
			data: {
				phone: $('input[name="phone"]').val(),
				choose:"phone"
			},
			error: function(xhr) {
				alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				$('#msg_user_phone').html(response);
				$('#msg_user_phone').fadeIn();
  			}
		});
    }else{
        $('#msg_user_phone').html("<span class='register_Prompt_fail'>EX: 09xxxxxxxx</span>");
    }
};

function checkRegPW(){
	if ($("input[name='password']").val().length >=1 && $("input[name='password_chk']").val().length >=1) {
		if($("input[name='password']").val() == $("input[name='password_chk']").val()){
			$('#msg_user_password').html("<span class='register_Prompt_OK'>verify success</spen>");
			$('#msg_user_password').fadeIn();
		}else{
			$('#msg_user_password').html("<span class='register_Prompt_fail'>verify fail</spen>");
			$('#msg_user_password').fadeIn();
		}
	}else{
        $('#msg_user_password').html('');
    }
};

function checkdata() {
	if($("input[name='uName']").val().length==0){
		alert("請輸入您姓名!");
		$("input[name='name']").focus();
		return false;
	}
	if($("select[name='b_year']").val()==0){
		alert("請選擇年!");
		$("select[name='b_year']").focus();
		return false;
	}
	if($("select[name='b_month']").val()==0){
		alert("請選擇月!");
		$("select[name='b_month']").focus();
		return false;
	}
	if($("select[name='b_day']").val()==0){
		alert("請選擇日!");
		$("select[name='b_day']").focus();
		return false;
	}
	if($("input:radio:checked[name='sex']").val()==undefined){
		alert("請選擇您性別!");
		$("input:radio:checked[name='sex']").focus();
		return false;
	}
	//var emailReg = /^[_a-z0-9]+@([_a-z0-9]+\.)+[a-z0-9]{2,3}$/;
	var emailReg = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
	if( emailReg.test($("input[name='mail']").val()) ){
	}else{
		alert("您輸入的Email地址格式不正確！");
		$("input[name='mail']").focus();
		return false;
	}
	if(!$("input[name='phone']").val().match(/^09[0-9]{8}$/)){
		alert( "手機不可空白!\n長度必須是10，\n不可以是文字，\n必定要09帶頭。");
		$("input[name='phone']").focus();
		return false;
	}
	var accountReg=/\s+/g;
	if($("input[name='account']").val()==0){
		alert("請輸入您帳號!");
		$("input[name='account']").focus();
		return false;
	}else if(accountReg.test($("input[name='account']").val())){
		alert("帳號不能含有空白!");
		$("input[name='account']").focus();
		return false;
	}else if($("input[name='account']").val().length <6){
		alert("帳號不得小於六碼!");
		$("input[name='account']").focus();
		return false;
	}
	if($("input[name='password']").val()==0){
		alert("請輸入您密碼!");
		$("input[name='password']").focus();
		return false;
	}
	if($("input[name='password_chk']").val()==0){
		alert("請驗證您密碼!");
		$("input[name='password_chk']").focus();
		return false;
	}

	if($("input[name='password']").val() != $("input[name='password_chk']").val()){
		alert("您兩次輸入的密碼不一樣！請重新輸入.");
		$("input[name='password']").focus();
		return   false;
	}
	Register();
};
