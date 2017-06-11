<?php

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
$uname=$_POST['username'];
$pword=$_POST['password'];
echo $uname ;
echo $pword ;
$sql1 = "Select id FROM login" ;
echo $sql1;
$result1 = mysql_query($sql1);
$norows=(mysql_num_rows($result1)+1);
$sql="Insert into login values('$norows','$uname','$pword')";
$result=mysql_query($sql);
echo $result ;
//$row = mysql_fetch_array($result);
//echo $row;
//$active = $row['active']; 
//echo $active ;     
//$count = mysql_num_rows($result); 
//echo $count ;  
//if($count == 1) {
?>
  <form action="form2.php" method="post" />
<p>Input 1: <input type="text" name="input1" /></p>
<input type="submit" value="Submit" />
</form>
<?php

//else 
?>

