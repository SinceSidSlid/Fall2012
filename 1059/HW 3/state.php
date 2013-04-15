
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>HW3 States</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php
	$varName = $_POST['Name'];
	$varState = $_POST['State'];
	$varCity = $_POST['City'];
	
	$PA = "";
	$NY = "";
	$WA = "";
	$OH = "";
	$CA = "";

	if ($_POST['Submit'] =="Submit" && $_POST['State'] != "Unselected") 
	{
		if ($_POST['State'] == "PA") $PA = 'selected="selected"';
		if ($_POST['State'] == "NY") $NY = 'selected="selected"';
		if ($_POST['State'] == "WA") $WA = 'selected="selected"';
		if ($_POST['State'] == "OH") $OH = 'selected="selected"';
		if ($_POST['State'] == "CA") $CA = 'selected="selected"';

	} //If the submit button is pressed and the State is selected hold the value of the state in the dropdown

	$Pittsburgh = "";
	$Philadelphia = "";
	$Harrisburg	= "";
	$LongIsland	= "";
	$Buffalo = "";
	$NewYorkCity = "";
	$Seattle = "";
	$Tacoma	= "";
	$Spokane = "";
	$Cleveland = "";
	$Cincinnati = "";
	$Columbus = "";
	$SanDiego = "";
	$SanFrancisco = "";
	$LosAngeles = "";


	if ($_POST['Submit'] =="Submit" && $_POST['State'] != "Unselected" && $_POST['City'] != "Unselected") 
	{
		if ($_POST['City'] == "Pittsburgh") $Pittsburgh = 'selected="selected"';
		if ($_POST['City'] == "Philadelphia") $Philadelphia = 'selected="selected"';
		if ($_POST['City'] == "Harrisburg") $Harrisburg = 'selected="selected"';

		if ($_POST['City'] == "Long Island") $LongIsland = 'selected="selected"';
		if ($_POST['City'] == "Buffalo") $Buffalo = 'selected="selected"';
		if ($_POST['City'] == "New York City") $NewYorkCity = 'selected="selected"';

		if ($_POST['City'] == "Seattle") $Seattle = 'selected="selected"';
		if ($_POST['City'] == "Tacoma") $Tacoma = 'selected="selected"';
		if ($_POST['City'] == "Spokane") $Spokane = 'selected="selected"';

		if ($_POST['City'] == "Cleveland") $Cleveland = 'selected="selected"';
		if ($_POST['City'] == "Cincinnati") $Cincinnati = 'selected="selected"';
		if ($_POST['City'] == "Columbus") $Columbus = 'selected="selected"';

		if ($_POST['City'] == "San Diego") $SanDiego = 'selected="selected"';
		if ($_POST['City'] == "San Francisco") $SanFrancisco = 'selected="selected"';
		if ($_POST['City'] == "Los Angeles") $LosAngeles = 'selected="selected"';

	}// If the submit button is pressed and the State and City are selected hold the value of the city in the dropdown
	

	function printStuff($varCity)
	{
			
			//I understand these were short, so I tried to make them fun. Found a lot of the original radio calls to use.
			if ($varCity == "Pittsburgh") {
				echo "<br /><h3>Maz's 1960 Walkoff to win the Series</h3>";
			}

			elseif ($varCity == "Philadelphia") {
				echo "<br /><h3>Chooch's 2008 slide in the 9th to win Game 3</h3>";
			}

			elseif ($varCity == "Harrisburg") {
				echo "<br /><h3>Strasburg's minor league debut</h3>";
			}

			elseif ($varCity == "Long Island") {
				echo "<br /><h3>80-84, The Islanders win 4 Cups in a row</h3>";
			}

			elseif ($varCity == "Buffalo") {
				echo "<br /><h3>Kelly brings the Bills from the brink against the Oilers in the Playoffs in the most improbable win in NFL History.</h3>";
			}

			elseif ($varCity == "New York") {
				echo "<br /><h3>Bobby Thompson's Shot Heard Round the World sends the Giants to the Series.</h3>";
			}

			elseif ($varCity == "Seattle") {
				echo "<br /><h3>The Mariners are going to play for the American League Championship! My Oh My! Edgar Martinez with a Double!</h3>";
			}

			elseif ($varCity == "Tacoma") {
				echo "<br /><h3>Hall hits the runner! Gonzaga Advances in '99.</h3>";
			}

			elseif ($varCity == "Spokane") {
				echo "<br /><h3>The '08 Spokane Chiefs Win the WHL Title for the second time!</h3>";
			}

			elseif ($varCity == "Cleveland") {
				echo "<br /><h3>A big sweep by the Tribe against the Mariners send the Indians to the Series.</h3>";
			}

			elseif ($varCity == "Cincinnati") {
				echo "<br /><h3>The Big Red Machine beats the Red Sox the day after Fisk's shot to left to win the World Series.</h3>";
			}

			elseif ($varCity == "Columbus") {
				echo "<br /><h3>The Buckeyes outlast the Hurricanes in Overtime to win the National Title.</h3>";
			}

			elseif ($varCity == "San Diego") {
				echo "<br /><h3>The Chargers beat the Dolphin in the 1995 AFL Championship Game and Advance to the Super Bowl.</h3>";
			}

			elseif ($varCity == "San Francisco") {
				echo "<br /><h3>Clark caught it! The 49ers go to the Super Bowl!</h3>";
			}

			else{
				echo "<br /><h3>I can't believe what I just saw! Gibson's walk-off wins Game 1 of the '88 Series.S</h3>";
			} //If the city equals one of the chosen cities print out a Sentence about the City.

			echo "<p>If you're done reading, head back to the <a href=\"index.php\">home page</a></p>";
	}
?>

</head>

<body>

     <h1>Great Sports Moments by State and City</h1>

<form action="state.php" method="post">
<p>Name: <input type="text" name="Name" value="<?=$varName;?>" size="25" maxlength="25" /></p>

<?php
	$varName = $_POST['Name'];
	$varState = $_POST['State'];
	$varCity = $_POST['City'];

	if ($_POST['Submit'] =="Submit" && empty($_POST['Name']))
	{
		echo"<p>I need a name kid!</p>";
	}//If the submit button was pressed and Name is empty print out error message
	
?>

<h2>Pick a State</h2>
	<select name="State">
	  <option value="Unselected">States</option>
	  <option value="PA" <?=$PA?> >PA</option>
	  <option value="NY" <?=$NY?> >NY</option>
	  <option value="WA" <?=$WA?> >WA</option>
	  <option value="OH" <?=$OH?> >OH</option>
	  <option value="CA" <?=$CA?> >CA</option>
	</select>



	<?php

		if ($_POST['Submit'] =="Submit" && $_POST['State'] == "Unselected") 
		{
			echo"<p>I need a State kid!</p>";
		}//If the submit button is pressed and the State is not selected print an error

		if ($_POST['Submit'] == "Submit" && $_POST['State'] != "Unselected")
		{
			
			echo "<h2>Pick a City</h2><select name=\"City\"><option value=\"Unselected\">Cities</option>";

			if ($varState == "PA") 
			{
			  echo "<option value=\"Pittsburgh\" $Pittsburgh >Pittsburgh</option>
			  <option value=\"Philadelphia\" $Philadelphia >Philadelphia</option>
			  <option value=\"Harrisburg\" $Harrisburg >Harrisburg</option>";
			}//If you picked PA you get these city choices
			

			elseif ($varState == "NY") 
			{
			  echo"<option value=\"Long Island\" $LongIsland >Long Island</option>
			  <option value=\"Buffalo\" $Buffalo>Buffalo</option>
			  <option value=\"New York City\" $NewYorkCity>New York City</option>";
			}//If you picked NY you get these city choices
			

			elseif ($varState == "WA") 
			{
			  echo"<option value=\"Seattle\" $Seattle>Seattle</option>
			  <option value=\"Tacoma\" $Tacoma>Tacoma</option>
			  <option value=\"Spokane\" $Spokane>Spokane</option>";
			}//If you picked WA you get these city choices

			elseif ($varState == "OH")
			{
			  echo"<option value=\"Cleveland\" $Cleveland>Cleveland</option>
			  <option value=\"Cincinnati\" $Cincinnati>Cincinnati</option>
			  <option value=\"Columbus\" $Columbus>Columbus</option>";
			}//If you picked OH you get these city choices

			else
			{
			  echo"<option value=\"San Diego\" $SanDiego>San Diego</option>
			  <option value=\"San Francisco\" $SanFrancisco>San Francisco</option>
			  <option value=\"Los Angeles\" $LosAngeles>Los Angeles</option>";
			}//If you picked CA you get these city choices

			echo "</select>";

		}//if the State and Name are fine then pick a set of cities to choose form based on the state.
	?>

	<p><input type="submit" name="Submit" value="Submit" /></p>

</form>

<?php

		if ($_POST['Submit'] == "Submit" && $_POST['City'] != "Unselected" && $_POST['State'] != "Unselected") 
		{
			printStuff($varCity);
		}//If you entered all the stuff then print the city's moment!

?>

</body>
</html>