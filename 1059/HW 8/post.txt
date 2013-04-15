<?php
	session_start();

	include 'dbconnect.php';

	//Connect to Database

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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Post</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
<?php
	

	/*There is no input
	The Function returns the uID for the current user
	It returns the uID
	*/
	function nametoNumber()
	{
		$varUname=$_SESSION['Username'];
		$test = "select uID from users where uName = '$varUname';";
		$back = mysql_query($test);

		if(!$back)
		{
			$message='Invalid Query ' .mysql_error()."\n";
			$message .= 'Whole Query ' . $back;
			die($message);
		}

		$return = mysql_fetch_array($back);
		return $return['uID'];
	}

	/*There is no input
	The Function returns the tID for recently posted topic
	It returns the tID
	*/
	function threadNametoID()
	{
		$varTname = $_POST['tName'];
		$test = "select tID from topic where tName = '$varTname';";
		$back = mysql_query($test);

		if(!$back)
		{
			$message='Invalid Query ' .mysql_errno()."\n";
			$message .= 'Whole Query ' . $back;
			die($message);
		}

		$return = mysql_fetch_array($back);
		return $return['tID'];
	}

	$varUid = intval(nametoNumber());
	$varBoard = intval($_POST['board']);
	$varThread = intval($_POST['thread']);
	$varTname = $_POST['tName'];
	$varText = $_POST['text'];
	$check = $_POST['check'];

	//For the Topic It creates a Topic and the First Reply, while For the Reply it doesn't make a topic.
	//I use the check variable I created using a hidden form element to test which one it is

	if ($check=='1')
	{
		$query = "insert into topic (tName, cID, uID) values ('$varTname', $varBoard, $varUid);";

		$result = mysql_query($query);

		if(!$result)
		{
			$message='Invalid Query' .mysql_errno()."\n";
			$message .= 'Whole Query' . $query;
			die($message);
		}
		
		$varThread2 = intval(threadNametoID());

		$query2 = "insert into reply (rText, uID, tID) values ('$varText', $varUid, $varThread2);";

		$result2 = mysql_query($query2);

		if(!$result2)
		{
			$message='Invalid Query' .mysql_error()."\n";
			$message .= 'Whole Query' . $query2;
			die($message);
		}
		else
		{
			print"<p>Topic Post Complete</p>";
		}

	}

	if ($check=='2') 
	{
		$query = "insert into reply (rText, uID, tID) values ('$varText', $varUid, $varThread);";

		$result = mysql_query($query);

		if(!$result)
		{
			$message='Invalid Query' .mysql_errno()."\n";
			$message .= 'Whole Query' . $query;
			die($message);
		}
		else
		{
			print"<p>Reply Post Complete</p>";
		}
	}

?>


</body>
</html>