<?php

require_once 'authentication.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die("Connect Error : " . $conn->connect_error);
if(isset($_POST['user'])&&isset($_POST['password']))
{
	$user = Sanitizer($conn,$_POST['user']);
	$password = Sanitizer($conn,$_POST['password']);
	$salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
	$saltedPW = $password . $salt;
	$hashedPW = hash('sha256',$saltedPW);
	$stmt = $conn->prepare('INSERT INTO general VALUES(?,?,?)');
	$stmt->bind_param('sss',$user,$hashedPW,$salt);
	$stmt->execute();
	$stmt->close();
}



echo <<<_END
	<form action="register.php" method = "post">
	User : <input type ='text' value='user'><br>
	Password: <input type = 'text' value = 'password'><br>
	<input type = 'submit' value = "Register">
	</form>
_END;

function Sanitizer($conn,$string)
{
 return htmlentities(remove_magic($conn,$string));
}

function remove_magic($conn,$string)
{
  if(get_magic_quotes_gpc()) $string = stringsplashes($string);
  return $conn->real_escape_string($string);
}

?>
