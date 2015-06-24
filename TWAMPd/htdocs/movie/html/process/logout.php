<?php session_start();
//將session清空
unset($_SESSION['account']);
unset($_SESSION['name']);
unset($_SESSION['competence']);
header('Location:../../index.html');//導向首頁
//echo '<meta http-equiv=REFRESH CONTENT=1;url=html/login.php>';
?>