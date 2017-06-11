<?php
session_start();

if(!$_SESSION['username'])
	die('Login is required');
else
{
define('DB_NAME', 'form1');
define('DB_USER', 'root');
define('DB_PASSWORD', 'harsha_sdslabs');
define('DB_HOST', 'localhost');

$link= mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if(!$link){
  die('Could not connect: ' . mysql_error());
}

$db_selected=mysql_select_db(DB_NAME,$link);

if (!$db_selected) {
  die('Can\'t use' .DB_NAME .':' . mysql_error());
}
echo 'Connected Successfully';
$sql1 = "Select id FROM form1" ;
echo $sql1;
$result1 = mysql_query($sql1);
$norows=(mysql_num_rows($result1)+1);
$value=$_POST['input1'];
$sql="Insert into form1  values('$norows','$value')";
if (!mysql_query($sql)) {
   die('Error: ' .mysql_error());
}
}
?>

