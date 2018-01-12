<?php
echo "<html><head><title>File Reader</title></head><body>
      	<form method = 'post' action = 'filereader.php' enctype = 'multipart/form-data'>
	 Select File : <input type = 'file' name = 'filename' size='10'><br>
	 <input type = 'submit' value = 'Upload'><br>
	</form></body></html>"

if ($_FILES)
	{
	 $name = $_FILES['filename']['name'];
	 $name = strtolower(ereg_replace("[^A-Za-z0-9.]","",$name));
	 move_uploaded_file($_FILES['filename']['tmp_name'],$name);
	 echo "'$name' is successfully uploaded.<br><hr><br>";
	 echo "<pre>" . file_get_contents($name) . "</pre>";
	}
?>
