<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Post HW 3</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />


	<?php
    	//Just wanted to seperate the variable stuff gor sticky elements
    	if($_POST['Submit'] =="Submit")
    	{
    		
    		$varBand1 = $_POST['Band1'];
    		$varBand2 = $_POST['Band2'];
    		$varBand3 = $_POST['Band3'];
    		$varBand4 = $_POST['Band4'];
    		$varBand5 = $_POST['Band5'];
    		$varBand6 = $_POST['Band6'];
    		$count = 1;

    		

    	}//If the submit button was pressed fill in the variables
    ?>
</head>

<body>

<h1>Favorite Bands</h1>
<form action="post.php" method="post">
<!--Here I'm creating the form -->
	<table>
		<tr>
			<td><p>Band 1</p></td>
			<td><input type="text" name="Band1" value="<?=$varBand1;?>" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td><p>Band 2</p></td>
			<td><input type="text" name="Band2" value="<?=$varBand2;?>" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td><p>Band 3</p></td>
			<td><input type="text" name="Band3" value="<?=$varBand3;?>" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td><p>Band 4</p></td>
			<td><input type="text" name="Band4" value="<?=$varBand4;?>" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td><p>Band 5</p></td>
			<td><input type="text" name="Band5" value="<?=$varBand5;?>" size="30" maxlength="30" /></td>
		</tr>
		<tr>
			<td><p>Band 6</p></td>
			<td><input type="text" name="Band6" value="<?=$varBand6;?>" size="30" maxlength="30" /></td>
		</tr>
	</table>

	<input type="submit" name="Submit" value="Submit" />

<?
	if ($_POST['Submit'] == "Submit") {
		
		echo "<br />";
		echo "<br />";

			foreach($_POST as $key => $name)
    		{
    			if ($count == 7) {
    				break;
    			}

    			echo "Band &#35;$count is $name";
    			echo "<br />";


    			$count++;
    		}//for each element in $_Post print it out

		
		echo "<br />";
		echo "Too bad all of your favorite bands suck! <br /> <br />";
		echo $_POST['Band1'], "? Really? Only middle school kids like ", $_POST['Band1'], "! <br /> <br />";
		echo $_POST['Band2'], " hasn't been good since the mid 90's. <br /> <br />";
		echo $_POST['Band3'], "? I'll give you that. They're pretty good. <br /> <br />";
		echo $_POST['Band4'], " is only listened to by middle aged women. <br /> <br />";
		echo $_POST['Band5'], " are terrible live. <br /> <br />";
		echo $_POST['Band6'], "! Remind me to never talk to you again! <br /> <br />";
	}
?>

</form>


</body>
</html>