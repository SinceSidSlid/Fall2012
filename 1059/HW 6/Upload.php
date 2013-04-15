<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>


<form action="Upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

  <?php

  //I used the W3C Schools Site as a guide for this part of the Homework
  	$error=$_FILES["file"]["error"];
  	$name=$_FILES["file"]["name"];
  	$type=$_FILES["file"]["type"];
  	$size=$_FILES["file"]["size"];
  	$temp=$_FILES["file"]["tmp_name"];



	if ($size < 250000)
	{
	  if ($error > 0)
	  {
	    echo "Error Code: ".$error ."<br />";
	  }
	  else
	  {
	    echo "File name: ".$name."<br />";
	    echo "File type: ".$type."<br />";
	    echo "File size: ".($size / 1024)." Kb<br />";

	    if (file_exists("store/".$name))
	    {
	      echo $name." has already been uploaded. ";
	    }
	    else
	    {
	      move_uploaded_file($temp,"store/" . $name);
	      echo "Your file is now located in: "."../store/".$name;
	    }
	  }
	}
	else
	  {
	  echo "The File is not able to be uploaded";
	  }
  ?>

</body>
</html>