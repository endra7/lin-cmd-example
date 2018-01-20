<?php
 require_once('authentication.php') // Php file containing hostname,username,password and database name
/*
 We have table 'general' having field user,pasword,salt in our db. 
*/

 $conn->new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die ("Database Connection Error : " . $conn->connect_error);

if(isset($_POST['username']) && isset($_POST['password']))
{
	$user=Sanitizer($conn,$_POST['username']);
	$password=Sanitizer($conn,$_POST['password']);
	$query= "SELECT * FROM general WHERE user = '$user'";
	$result = $conn->execute($query);
	$salt = $result->fetch_assoc()['salt'];
	$enteredPass = $password . $salt;
	$hashedPass = hash("sha256",$enteredPass);
	$query = "SELECT * FROM general WHERE user = '$user' and password = '$hashedPass'";
	$result = $conn->query($query);
	if(!$result) { echo "Incorrect  user or password";}
	else	{echo "Login Succesful";}
}



echo <<<__END
	<form action = "login.php" method = "post">
	User: <input type="text" name = "username"><br>
	Password: <input type="text" name= "password"><br>
	<input type ="submit" value="Log In"><br>
	<form>
__END;



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
