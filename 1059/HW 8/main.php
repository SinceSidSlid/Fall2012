<?php
	session_start();

	include 'dbconnect.php';

//Connecting to the Database

	$varUname = $_POST['Username'];
	$varPword = $_POST['Password'];

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

//Checking Log In Info
	$query = "select uName, pWord from users where uName = '$varUname' and pWord = '$varPword';";
	$result = mysql_query($query);
	$c = mysql_num_rows($result);

	if(!$result)
	{
		$message='Invalid Query ' .mysql_errno()."\n";
		$message .= 'Whole Query ' . $query;
		die($message);
	}

	if($c == 1)
	{
		print"<p>Welcome ".$varUname."</p>";
		$_SESSION['Username'] = $_POST['Username'];
	}
	else
	{
		print"<p>Failed ".$varUname."</p>";
	}

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Forum</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

<h1>The 1059 Class Forums</h1>	
<?php
//This is the main forum page only accessable if you have logged in


//Running and Testing Query
$display = 'select category.cName, count(tID) as threads from category, topic where category.cID = topic.cID group by category.cID;';
$results = mysql_query($display);

if(!$results){
    $message='Invalid Query ' .mysql_errno()."\n";
    $message .= 'Whole Query ' . $query;
    die($message);
}

$count = 1;

//Printing the Table
print'<table border="1">';
print'<tr><td width="400px">Forum</td><td width="50px">Threads</td></tr>';

	while($row = mysql_fetch_array($results))
		{
			print'<tr>';
			print"<td><a href='board.php?board=$count'>".$row['cName']."</a></td>";
			print'<td>'.$row['threads'].'</td>';
			print "</tr>";
			$count++;
		}

print'</table>';

?>

<p><a href="logoff.php">Logoff</a></p>

</body>
</html>