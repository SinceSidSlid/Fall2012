<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Results</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

<?php

	$varUname=$_POST['Username'];
	$varQ1=$_POST['Q1'];
	$varQ2=$_POST['Q2'];
	$varQ3=$_POST['Q3'];
	$varQ4=$_POST['Q4'];
	$varQ5=$_POST['Q5'];

	$questions = 5;
	$right = 0;
	$date = date('F j Y g i A');
	$ip = $_SERVER['REMOTE_ADDR'];
	$file = "Save.txt";
	$string = "";
	$array;
	$arrayin;
	$count=0;
	$tright=0.0;
	$tcalc=0.0;


	//This function echos back any errors to the user and then ends the program. It returns nothing.
	//The input are any errors detected, and they are strings
	function died($error)
	{
		var_dump($_POST);
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}//end died
			     
	// This if statement checks to see if the username was entered
	if(empty($_POST['Username']) )
	{
			died('You forgot to enter your username!');
		
	}//End if

	if ($varUname=="ug1") 
	{
		if ($varQ1=="D") {
			$right++;
		}
		if ($varQ2=="A") {
			$right++;
		}
		if ($varQ3=="C") {
			$right++;
		}
		if ($varQ4=="B") {
			$right++;
		}
		if ($varQ5=="A") {
			$right++;
		}
		echo "<p>You got ".$right." out of ".$questions." right</p>";
		echo"<p>".$date."</p>";
		echo"<p>".$ip."</p>";

		
		file_put_contents($file, $varUname.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $right."/".$questions.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $ip.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $date.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ1.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ2.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ3.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ4.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ5."\n",FILE_APPEND | LOCK_EX);


		$string=file_get_contents($file);
		$array=preg_split('/\r\n|\r|\n/', $string);


		print"<table border=\"1\">";
		print"<tr>
		<td width=\"100px\">Username</td>
		<td>Score</td>
		<td>IP Address</td>
		<td>Date</td>
		<td>Answer 1</td>
		<td>Answer 2</td>
		<td>Answer 3</td>
		<td>Answer 4</td>
		<td>Answer 5</td>
		</tr>";

		foreach ($array as $value) 
		{
			if (empty($value)) {
				break;
			}

			$arrayin = explode(",", $value);

			echo "<tr>";

				foreach ($arrayin as $data) 
				{
					print"<td>".$data."</td>";
					if ($data == "ug1") {
						$count--;
					}
				}

			echo "</tr>";

			$count++;
		}

		$tcalc = $tright/$count;

		print"</table>";

		print $count." number of people have taken this quiz <br />";



		print"<form action=\"QuizHandler.php\" method=\"post\">";

		if($_POST['submit'] == "Quiz") 
		{   
            include("QuizInc.php");
            print "<input type=\"submit\" name=\"submit\" value=\"Hide Quiz\" />";
            print "<input type=\"hidden\" name=\"Username\" value=\"$varUname\">";
            print "<input type=\"hidden\" name=\"Q1\" value=\"$varQ1\">";
            print "<input type=\"hidden\" name=\"Q2\" value=\"$varQ2\">";
            print "<input type=\"hidden\" name=\"Q3\" value=\"$varQ3\">";
            print "<input type=\"hidden\" name=\"Q4\" value=\"$varQ4\">";
            print "<input type=\"hidden\" name=\"Q5\" value=\"$varQ5\">";
        }

        else
        {   
            print "<input type=\"hidden\" name=\"Username\" value=\"$varUname\">";
            print "<input type=\"hidden\" name=\"Q1\" value=\"$varQ1\">";
            print "<input type=\"hidden\" name=\"Q2\" value=\"$varQ2\">";
            print "<input type=\"hidden\" name=\"Q3\" value=\"$varQ3\">";
            print "<input type=\"hidden\" name=\"Q4\" value=\"$varQ4\">";
            print "<input type=\"hidden\" name=\"Q5\" value=\"$varQ5\">";
            print "<input type=\"submit\" name=\"submit\" value=\"Quiz\" />";

        }

        print"</form>";

	}

	else
	{
		if ($varQ1=="D") {
			$right++;
		}
		if ($varQ2=="A") {
			$right++;
		}
		if ($varQ3=="C") {
			$right++;
		}
		if ($varQ4=="B") {
			$right++;
		}
		if ($varQ5=="A") {
			$right++;
		}
		echo "<p>You got ".$right." out of ".$questions." right</p>";
		echo"<p>".$date."</p>";
		echo"<p>".$ip."</p>";

		
		file_put_contents($file, $varUname.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $right."/".$questions.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $ip.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $date.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ1.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ2.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ3.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ4.", ",FILE_APPEND | LOCK_EX);
		file_put_contents($file, $varQ5."\n",FILE_APPEND | LOCK_EX);

	}
?>

</body>
</html>