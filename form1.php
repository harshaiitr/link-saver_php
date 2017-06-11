<?php
session_start();
#if (!$_SESSION['username'])
#	echo "First login";

#else

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
$sql = "SELECT id FROM login WHERE username='$uname' and password='$pword'";
echo $sql;

$result = mysql_query($sql);
echo $result ;
$row = mysql_fetch_array($result);
echo $row;  
$count = mysql_num_rows($result); 
echo $count ;  
if($count == 1) {
?>
  <form action="form2.php" method="post" />
<p>Input 1: <input type="text" name="input1" /></p>
<input type="submit" value="Submit" />
</form>

<?php
$_SESSION['username']=$uname;
if(!empty($_POST["remember"])) {
				setcookie ("username",$uname,time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$pword,time()+ (10 * 365 * 24 * 60 * 60));
			} 
			else {
				if(isset($_COOKIE["username"])) {
					setcookie ("username","");
				}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");
				}

                 }
             }
else 
{
 echo $error = "Your Login Name or Password is invalid";
}

?>

