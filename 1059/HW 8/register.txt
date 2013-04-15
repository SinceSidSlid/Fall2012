<?php
	session_start();

	include 'dbconnect.php';

	$varRUname = $_POST['RUsername'];
	$varRPword = $_POST['RPassword'];

	//Connecting to Database

	$link = mysql_connect($host, $username, $password);
	if (!$link) 
	{
		print '<p>' ;
		die('Could not connect'. mysql_error());
		print '</p>' ;
	}

	$db_selected = mysql_select_db('ug37',$link);

	if(!$db_selected)
	{
		die('Can\'t use database: ' . mysql_error());
		print '<br />' ;
	}

	//Creating a New User

	$query = "insert into users (uName, pWord) values ('$varRUname', '$varRPword');";

	$result = mysql_query($query);

	if(!$result)
	{
		$message='Invalid Query' .mysql_errno()."\n";
		$message .= 'Whole Query' . $query;
		die($message);
	}

	$query2 = "select uName, pWord from users where uName = '$varRUname' and pWord = '$varRPword';";
	$result2 = mysql_query($query2);
	$c = mysql_num_rows($result2);

	if(!$result2)
	{
		$message='Invalid Query' .mysql_errno()."\n";
		$message .= 'Whole Query' . $query;
		die($message);
	}

	if($c == 1)
	{
		print"<p>Welcome ".$varRUname."</p>";
		print"<p><a href='login.php'>Go Back and Login!</a></p>";

	}
	else
	{
		print"<p>Failed ".$varRUname."</p>";
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Register</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>



</body>
</html>