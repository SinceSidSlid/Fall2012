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
	<title>Thread</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

<h1>The 1059 Class Forums</h1>	
<?php

$thread = $_GET["thread"];
$board = $_GET["board"];

$display = "select reply.rID, users.uName, reply.rText from reply inner join users on users.uID = reply.uID where reply.tID = '$thread';";
$results = mysql_query($display);

if(!$results){
    $message='Invalid Query ' .mysql_errno()."\n";
    $message .= 'Whole Query ' . $display;
    die($message);
}

$count = 1;

print'<table border="1">';
print'<tr><td width="50px">Post#</td><td width="50px">Name</td><td width="400px">Post</td></tr>';

	while($row = mysql_fetch_array($results))
		{
			print'<tr>';
			print"<td>".$count."</a></td>";
			print'<td>'.$row['uName'].'</td>';
			print'<td>'.$row['rText'].'</td>';
			print "</tr>";
			$count++;
		}

print'</table>';



?>

<br />
<h3>Reply:</h3>
<form name="reply" action="post.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><p>Text:</p></td><td><textarea name="text" rows="4" cols="50"></textarea></td>
		</tr>
		<tr>
			<td colspan='2'><p><input type="submit" name="Push" value="Post" /></p></td>
		</tr>
	</table>
	<input type='hidden' name='check' value='2' />
	<input type='hidden' name='board' value='<?=$board?>' />
	<input type='hidden' name='thread' value='<?=$thread?>' />
</form>

<p><a href="logoff.php">Logoff</a></p>

</body>
</html>