<script type="text/javascript"> 
var xmlHttp; 
function createXHR(){ 
if (window.XMLHttpRequest) { 
xmlHttp = new XMLHttpRequest(); 
}else if (window.ActiveXObject) { 
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); 
} 

if (!xmlHttp) { 
alert('您使用的瀏覽器不支援 XMLHTTP 物件'); 
return false; 
} 
} 

function sendRequest(email){ 
createXHR(); 
var url='checkuser.php?email='+email+'&timeStamp='+new Date().getTime(); 
window.status='Checking customer ID...'; 
xmlHttp.open('GET',url,true); 
xmlHttp.onreadystatechange=catchResult; 
//xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
xmlHttp.send(null); 
} 

function catchResult(){ 
if (xmlHttp.readyState==4){ 
s=xmlHttp.responseText; 
if (xmlHttp.status == 200) { 
if (s=='noemail'){ 
document.getElementById('chkr').innerHTML='不是邮件地址'; 
} else if (s=='true'){ 
document.getElementById('chkr').innerHTML='已经使用'; 
}else{ 
document.getElementById('chkr').innerHTML='可用'; 
} 
} 
} 
} 
</script> 
<style type="text/css"> 
<!-- 
.style1 {color: #FF0000} 
--> 
</style> 
<form name="form1" onSubmit="return CheckForm();" METHOD="POST" action="reg_ok.php" id="form1"> 
<table width="642" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="49" style="background-repeat:no-repeat"><span class="main_title">Register</span></td>
  </tr>
  <tr>
    <td valign="top">

<table width="642" border="0"  cellspacing="5" cellpadding="0"  class="register">
	<Tr><Td colspan="2">The marked fields (*) must be filled in correctly.</Td></Tr>
  <tr>
    <td >Email</td>
    <td><input type="text" name="email" value="" size="30" onblur="sendRequest(this.value);" id="email"><span id="chkr"></span>*</td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="password" value="" size="30">*</td>
  </tr>
  <tr>
    <td>Name</td>
    <td>Mr.  
      <INPUT name="sex" type=radio value=0 checked>
      &nbsp;Ms. <INPUT type=radio 
      value=1 name="sex">
    <INPUT size=14 name="contact">*</td>
  </tr>
  <tr>
    <td>Company</td>
    <td><input type="text" name="company" value="" size="30">*</td>
  </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="address" value="" size="30">*</td>
  </tr>
 <tr>
    <td>Country</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" name="tel" value="" size="30"></td>
  </tr>
  <tr>
    <td>Fax</td>
    <td><input type="text" name="fax" value="" size="30"></td>
  </tr>
  <tr>
    <td colspan="2"><INPUT type=checkbox CHECKED name=newsletter>Yes, keep 
      me informed on new products.</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="" type="submit" value="Register" onSubmit="submit.disabled=true"></td>
  </tr>
</table>

<script language=javascript>
	function CheckForm()
	{   

		if(document.form1.email.value == "")
		{
			alert("please enter your email.");
			document.form1.email.focus();
			return false;
		}
		if(document.form1.password.value=="")
		{
			alert("please enter your password.");
			document.form1.password.focus();
			return false;
		}
		if(document.form1.contact.value=="")
		{
			alert("please enter your contact.");
			document.form1.contact.focus();
			return false;
		}
		if(document.form1.company.value=="")
		{
			alert("please enter your company.");
			document.form1.company.focus();
			return false;
		}

	}
</script></td>
  </tr>
 
</table>
</form>
