<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
</head>

<body>

<h1>Days of the Week</h1>

<h3>HTML</h3>
<p>
	Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
</p>
<!--Using HTML to print -->


     <?php
     
     echo"<h3>Echo</h3>";
     echo "Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday <br />";
     //Using an echo to print

     echo"<h3>Array</h3>";
     $Weekdays = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
     $Length = count($Weekdays);

     for($i = 0; $i < $Length; $i++){
     	
     	if($i == $Length - 1){
     		echo "$Weekdays[$i]";
     		break;
     	}

     	echo "$Weekdays[$i], ";

     }

      //Using an array to print

     ?>

</body>
</html>