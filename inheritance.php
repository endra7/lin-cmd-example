<?php
 echo "<html><head><title>Inheritance</title></head><body>
	<form method = 'post' action = 'inheritance.php'>
	Name : <input type = 'text' name = 'username' size='30'><br>
	Password : <input type = 'password' name = 'userpassword' size='30'><br>
	Email : <input type = 'text' name = 'useremail' size = '30'><br>
	Address: <input type = 'text' name='useraddress' size ='30'><br>
	<input type = 'submit' value = 'Save'>
	</form><br><hr></body></html>";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $obj = new Subscriber;
 $obj->addSubscriber($_POST['username'],$_POST['userpassword'],$_POST['useremail'],$_POST['useraddress']);
 $obj->showInfo();

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
		 echo "Name: " . $this->name;
		 echo "Password: " . $this->password;
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
		 echo "Email:" . $this->email;
		 echo "Address:" . $this->address;
		}
	}//end of Subscriber class

}//end of request method
?>