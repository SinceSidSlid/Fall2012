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

	$vartName = $_POST['tName'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Board</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

<h1>The 1059 Class Forums</h1>	
<?php

$board = $_GET["board"];

$display = "select topic.tID, topic.tName, count(rID) as reply, users.uName as op  from topic, reply, users where topic.cID = $board and topic.tID = reply.tID and topic.uID = users.uID group by topic.tID;";
$results = mysql_query($display);

if(!$results){
    $message='Invalid Query ' .mysql_errno()."\n";
    $message .= 'Whole Query ' . $display;
    die($message);
}

print'<table border="1">';
print'<tr><td width="400px">Thread</td><td width="50px">Posts</td><td width="100px">OP</td></tr>';

	while($row = mysql_fetch_array($results))
		{
			$topic = $row['tID'];
			print'<tr>';
			print"<td><a href='thread.php?board=$board&thread=$topic'>".$row['tName']."</a></td>";
			print'<td>'.$row['reply'].'</td>';
			print'<td>'.$row['op'].'</td>';
			print "</tr>";
		}

print'</table>';

?>

<br />
<h3>Reply:</h3>
<form name="post" action="post.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><p>Title:</p></td><td><input type="text" name="tName" value="<?=$vartName;?>" size="25" maxlength="25" /></td>
		</tr>
		<tr>
			<td><p>Text:</p></td><td><textarea name="text" rows="4" cols="50"></textarea></td>
		</tr>
		<tr>
			<td colspan='2'><p><input type="submit" name="Push" value="Post" /></p></td>
		</tr>
	</table>
	<input type='hidden' name='check' value='1' />
	<input type='hidden' name='board' value='<?=$board?>' />
</form>

<p><a href="logoff.php">Logoff</a></p>

</body>
</html>