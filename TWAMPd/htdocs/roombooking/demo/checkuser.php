<?php require('../Connections/lr.php'); ?>
<?php
//email����
function getEmail($str) { 
$pattern = "/[a-z0-9]([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";//Ϊ���ʺ�qq����������,����ͷ�����޸� 
preg_match_all($pattern,$str,$emailArr); 
return $emailArr[0]; 
}
$message = "";
$emailstr = $_GET['email'];
if (getEmail($emailstr))
{
$query = "SELECT email FROM `user` WHERE email = '$emailstr'";
$result = mysql_query($query);
if( mysql_num_rows($result) != 1 )
{
	//  The user ID specified was not found
	$message = "False";
}
else
{
	//  The user ID found
	$message = "true";
}
}
else
{	$message = "noemail";}
?>
<?php echo $message; ?>