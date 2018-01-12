<?php
 echo "<!DOCTYPE html><html><head><title>File Reader</title></head><body>
	<form method = 'post' action = 'filereader.php' enctype='multipart/form-data'>
	Select File : <input type = 'file' name = 'filename' size = '10'><br>
	<input type = 'submit' value = 'Upload'><br>
	</form></body></html>";

 if($_FILES)
	{
	  $name = $_FILES['filename']['name'];
	  switch($_FILES['filename']['type'])
		{
		 case 'image/pjpeg':
		 case 'image/jpeg' : $ext = jpg; break;
		 case 'image/gif'  : $ext = gif; break;
		 case 'image/png'  : $ext = png; break;
		 case 'image/tiff' : $ext = tif; break;
		 default: $ext=""; break;
		}
	 if($ext)
		{
		 $name = strtolower(ereg_replace("[^A-Za-z0-9.]","",$name));
		 move_uploaded_file($_FILES['filename']['tmp_name'],$name);
		 echo "Uploaded image '$name' : <br>";
		 echo "<img src = '$name' width=400 height=400>";
		}
	 else echo "'$name' ois not an accepted image file";
	}
	else echo "No imagae";
?>
