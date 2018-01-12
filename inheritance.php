<?php
 echo "<html><head><title>Inheritance</title></head><body>
	<form method = 'post' action = 'inheritance.php'>
	Name : <input type = 'text' name = 'uname' size='30'><br>
	Password : <input type = 'password' name = 'upassword' size='30'><br>
	Email : <input type = 'text' name = 'uemail' size = '30'><br>
	Address: <input type = 'text' name='uaddress' size ='30'><br>
	<input type = 'submit' value = 'Save'>
	</form><br><hr></body></html>";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $subscriber = new Subscriber;
 $subscriber->addSubscriber($_POST['uname'],$_POST['upassword'],$_POST['uemail'],$_POST['uaddress']);
 $subscriber->showInfo();

 class User  //primary class
	{
	 private $name,$password;
	 function __construct()
		{
		 $name = "N/A";
		 $password = "N/A";
		}
	 function addUser($param_name,$param_pass)
		{
		 $this->name = $param_name;
		 $this->password = md5($param_pass);
		}
	 function showInfo()
		{
		 echo "Name: " . $this->name . "<br>";
		 echo "Password: " . $this->password . "<br>";
		}
	} //end of user class

class Subscriber extends User
	{
	 private $email, $address;
	 function __construct()
		{
		 parent::__construct();
		 $this->email="N/A";
		 $this->address="N/A";
		} 
	 function addSubscriber($param_name,$param_password,$param_email,$param_address)
		{
		 parent::addUser($param_name,$param_password);
		 $this->email=$param_email;
		 $this->address=$param_address;
		}
	 function showInfo()
		{
		 parent::showInfo();
		 echo "Email:" . $this->email . "<br>";
		 echo "Address:" . $this->address . "<br>";
		}
	}//end of Subscriber class

}//end of request method
?>
