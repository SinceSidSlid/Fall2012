<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>A Directory Table</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
<?php
//Zack Hall and I worked on this together
	$directory="../HW4";
	$files=scandir($directory);

	print"
	<table border=\"1\">
		<tr>
			<td colspan=\"4\">Directory Listing for ../Strings/</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>Owner ID</td>
			<td>Permissions</td>
			<td>Size</td>
		</tr>";

	foreach ($files as $value) 
	{
		if((strcmp($value, '.') !=0) && (strcmp($value, '..') !=0))
		{
			$valueFullName = $directory."/".$value;
			echo "<tr><td>",$value, "</td><td>",fileowner($valueFullName),"</td><td>",fileperms($valueFullName),"</td><td>",filesize($valueFullName),"</td></tr>";
		}
	}

	print"</table>";



	
?>
     

</body>
</html>