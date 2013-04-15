<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Quiz</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php
		$varUname=$_POST['Username'];
		$varQ1=$_POST['Q1'];
		$varQ2=$_POST['Q2'];
		$varQ3=$_POST['Q3'];
		$varQ4=$_POST['Q4'];
		$varQ5=$_POST['Q5'];
	?>
</head>

<body>
<h1>PHP Quiz</h1>
<p>This quiz will test your PHP knowledge, and your very being. Have Fun!</p>

<form action="QuizHandler.php" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td><p>Username</p></td><td><input type="text" name="Username" value="<?=$varUname;?>" size="25" maxlength="25" /></td>
		</tr>
	</table>

<?php

	//QUESTION 1
	print'<h3>Question 1:</h3>
	<h4>What character starts a PHP variable?</h4>';

	print '<p> &#42;<input type="radio" name="Q1" value="A" '; 
	if ($_POST['Q1'] == 'A') echo 'checked="checked"'; //Check if A for sticky radio button
	print '/>'; 

	print '<br />&#38; <input type="radio" name="Q1" value="B" ';
	if ($_POST['Q1'] == 'B') echo 'checked="checked"'; //Check if B for sticky radio button
	print '/>';
						
	print '<br />&#33;<input type="radio" name="Q1" value="C" ';
	if ($_POST['Q1'] == 'C') echo 'checked="checked"'; //Check if C for sticky radio button
	print '/>';

	print '<br />&#36; <input type="radio" name="Q1" value="D" ';
	if ($_POST['Q1'] == 'D') echo 'checked="checked"'; //Check if D for sticky radio button
	print '/></p>';					


	//QUESTION 2
	print'<h3>Question 2:</h3>
	<h4>What gets printed? print"a\\\\b\\n";</h4>';

	print '<p>a\\b newline <input type="radio" name="Q2" value="A" '; 
	if ($_POST['Q2'] == 'A') echo 'checked="checked"'; //Check if A for sticky radio button
	print '/>'; 

	print '<br />ab newline <input type="radio" name="Q2" value="B" ';
	if ($_POST['Q2'] == 'B') echo 'checked="checked"'; //Check if B for sticky radio button
	print '/>';
						
	print '<br />a\\b\\n<input type="radio" name="Q2" value="C" ';
	if ($_POST['Q2'] == 'C') echo 'checked="checked"'; //Check if C for sticky radio button
	print '/>';

	print '<br /> a\\\\b\\n<input type="radio" name="Q2" value="D" ';
	if ($_POST['Q2'] == 'D') echo 'checked="checked"'; //Check if D for sticky radio button
	print '/></p>';		


	//QUESTION 3
	print'<h3>Question 3:</h3>
	<h4>The PHP starting tags are?</h4>';

	print '<p>&lt;php ... /&gt;<input type="radio" name="Q3" value="A" '; 
	if ($_POST['Q3'] == 'A') echo 'checked="checked"'; //Check if A for sticky radio button
	print '/>'; 

	print '<br />&lt;php&gt;  ... &lt;/php&gt; <input type="radio" name="Q3" value="B" ';
	if ($_POST['Q3'] == 'B') echo 'checked="checked"'; //Check if B for sticky radio button
	print '/>';
						
	print '<br />&lt;?php ... ?&gt; <input type="radio" name="Q3" value="C" ';
	if ($_POST['Q3'] == 'C') echo 'checked="checked"'; //Check if C for sticky radio button
	print '/>';

	print '<br />? ... ?<input type="radio" name="Q3" value="D" ';
	if ($_POST['Q3'] == 'D') echo 'checked="checked"'; //Check if D for sticky radio button
	print '/></p>';	


	//QUESTION 4
	print'<h3>Question 4:</h3>
	<h4>Statements in PHP end with?</h4>';

	print '<p>:<input type="radio" name="Q4" value="A" '; 
	if ($_POST['Q4'] == 'A') echo 'checked="checked"'; //Check if A for sticky radio button
	print '/>'; 

	print '<br />;<input type="radio" name="Q4" value="B" ';
	if ($_POST['Q4'] == 'B') echo 'checked="checked"'; //Check if B for sticky radio button
	print '/>';
						
	print '<br />&amp; <input type="radio" name="Q4" value="C" ';
	if ($_POST['Q4'] == 'C') echo 'checked="checked"'; //Check if C for sticky radio button
	print '/>';

	print '<br />\\ <input type="radio" name="Q4" value="D" ';
	if ($_POST['Q4'] == 'D') echo 'checked="checked"'; //Check if D for sticky radio button
	print '/></p>';		


	//QUESTION 5
	print'<h3>Question 5:</h3>
	<h4>Which one is not right?</h4>';

	print '<p>&#36;2cookies;<input type="radio" name="Q5" value="A" '; 
	if ($_POST['Q5'] == 'A') echo 'checked="checked"'; //Check if A for sticky radio button
	print '/>'; 

	print '<br />&#36;twocookies;<input type="radio" name="Q5" value="B" ';
	if ($_POST['Q5'] == 'B') echo 'checked="checked"'; //Check if B for sticky radio button
	print '/>';
						
	print '<br />&#36;cookies2;<input type="radio" name="Q5" value="C" ';
	if ($_POST['Q5'] == 'C') echo 'checked="checked"'; //Check if C for sticky radio button
	print '/>';

	print '<br />&#36;cookies;<input type="radio" name="Q5" value="D" ';
	if ($_POST['Q5'] == 'D') echo 'checked="checked"'; //Check if D for sticky radio button
	print '/></p>';		
?>

</br>
<p><input type="submit" name="Submit" value="Submit" /></p>
</form>

</body>
</html>