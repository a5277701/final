<?php session_start();
if($_SESSION['account']!= null){
  echo $_SESSION['competence']."：".$_SESSION['name']."，你已經登入了，無須註冊。";
  echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
  //echo "<script>javascript:history.go(-1)</script>";
}else{ ?>

  <script type="text/javascript" src="js/aj-birthday.js"></script>
  <script type="text/javascript" src="js/register.js"></script>
  <div class="r_form">
      <spen>姓名：</spen><input type="text" name="uName"><br>
      <div class="birthday-zone">
        <spen>生日：</spen><select name="b_year" class="year">
                          <option Value=0>請選擇</option>
                         </select>
                         <select name="b_month" class="month">
                          <option Value=0>請選擇</option>
                         </select>
                         <select name="b_day" class="day">
                          <option Value=0>請選擇</option>
                         </select>
      </div>
      <spen>性別：</spen><input type="radio" name="sex" value="男">男
                          <input type="radio" name="sex" value="女">女<br>
      <spen>信箱：</spen><input type="text" name="mail" onkeyup="checkRegMail()"><span id="msg_user_mail"></span><br />
      <spen>電話：</spen><input type="text" name="phone" onkeyup="checkRegPhone()"><span id="msg_user_phone"></span><br />
      <spen>帳號：</spen><input type="text" name="account" onkeyup="checkRegAcc()"><span id="msg_user_account"></span><br />
      <spen>密碼：</spen><input type="password" name="password" onkeyup="checkRegPW()"><br>
      <spen>確認密碼：</spen><input type="password" name="password_chk" style="width: 137px;" onkeyup="checkRegPW()"><span id="msg_user_password"></span><br />
      <input type="button" id="submit" value="註冊" style="margin-left:100px;"onclick="checkdata();">
  </div>

  <div id="Prompt"></div>

<?php } ?>

