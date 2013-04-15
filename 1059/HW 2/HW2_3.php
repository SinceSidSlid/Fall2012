<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Love Connection</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />

	<?php
		$varFName=$_POST['FirstName'];
		$varLName=$_POST['LastName'];
		$varCity=$_POST['City'];
		$varJob=$_POST['Job'];
		$varAge=$_POST['Age'];
		$varGender=$_POST['Gender'];
		$varStatus=$_POST['Status'];
		$varOrientation=$_POST['Orientation'];
		$varSmoke=$_POST['Smoke'];
		$varAlcohol=$_POST['Alcohol'];
		$varHard=$_POST['Hard'];
	?>
</head>

<body>

<div id="container">

<div id="header">

	<div id="headertext">

		<h1>Love Connection</h1>

	</div>

</div><!--header End Tag-->


<div id="body">
	
		<div class="col" id="leftcol">

			<div id="leftcont">

				<h1>Tell Us About Yourself</h1>

				<br />

				<p>

					<form action="HW2_3.php" method="post" enctype="multipart/form-data">

						<table>
							<tr>
								<td><p>First Name</p></td><td><input type="text" name="FirstName" value="<?=$varFName;?>" size="25" maxlength="25" /></td>
							</tr>
							<tr>
								<td><p>Last Name</p></td><td><input type="text" name="LastName" value="<?=$varLName;?>" size="25" maxlength="25" /></td>
							</tr>
							<tr>
								<td><p>City</p></td><td><input type="text" name="City" value="<?=$varCity;?>" size="25" maxlength="25" /></td>
							</tr>
							<tr>
								<td><p>Occupation</p></td><td><input type="text" name="Job" value="<?=$varJob;?>" size="25" maxlength="50" /></td>
							</tr>
							<tr>
								<td><p>Age</p></td><td><input type="text" name="Age" value="<?=$varAge;?>" size="6" maxlength="3" /></td>
							</tr>




						</table>
						<br />
						<?php
							print '<p>Gender<br />Male <input type="radio" name="Gender" value="Male" '; 
							if ($_POST['Gender'] == 'Male') echo 'checked="checked"'; //Check if "Male" for sticky radio button
							print '/>'; 
							print '<br />Female <input type="radio" name="Gender" value="Female" ';
							if ($_POST['Gender'] == 'Female') echo 'checked="checked"'; //Check if "Female" for sticky radio button
							print '/></p><br />';
						
							print '<p>Relationship Status<br />Single<input type="radio" name="Status" value="Single" '; 
							if ($_POST['Status'] == 'Single') echo 'checked="checked"'; //Check if "Single" for sticky radio button
							print '/>'; 
							print '<br />Married <input type="radio" name="Status" value="Married" ';
							if ($_POST['Status'] == 'Married') echo 'checked="checked"'; //Check if "Married" for sticky radio button
							print '/></p>';

							print
							'<br /><p>Orientation</p>
								<p><select name="Orientation">
 									<option value="Straight"';

 									if ($_POST['Orientation'] == "Straight") echo ' selected="selected"'; //More sticky Stuff?
									print'>Straight</option>

 									<option value="Gay"';

 									if ($_POST['Orientation'] == "Gay") echo ' selected="selected"'; //More sticky Stuff?
									print'>Homosexual</option>

									<option value="Questioning"';

									if ($_POST['Orientation'] == "Questioning") echo ' selected="selected"'; //More sticky Stuff?
									print'>Questioning</option> 

 									</select></p><br />';

							print"<p>Drugs?</p>";

							print '<p>Cigarettes <input type="checkbox" name="Smoke" value="Smoke" ';
							if ($_POST['Smoke'] == "Smoke") echo 'checked="checked"';//Check if Cigarette user for sticky checkbox

							print ' /><br /> Alcohol <input type="checkbox" name="Alcohol" value="Alcohol" ';
							if ($_POST['Alcohol'] == "Alcohol") echo 'checked="checked"';//Check if Alcohol user for sticky checkbox

							print ' /><br /> Illict Drugs <input type="checkbox" name="Hard" value="Hard" ';
							if ($_POST['Hard'] == "Hard") echo 'checked="checked"';//Check if Illict Drugs user for sticky checkbox
							print ' /></p>';

						?>	
						<br />
						<p><input type="submit" name="Submit" value="Submit" /></p>
					</form>

				</p>

			</div><!--leftcont End Tag-->

		</div><!--leftcol End Tag-->

		<div class="col" id="rightcol">

			<div id="rightcont">		

				<h1>Your Match!</h1>
				<br />

				<?php

				//Zack helped me with the Validation Stuff below

				if($_POST['Submit'] == "Submit"){

				//This died function is called when there is an error in the html form data

					$varFName=$_POST['FirstName'];
					$varLName=$_POST['LastName'];
					$varCity=$_POST['City'];
					$varJob=$_POST['Job'];
					$varAge=$_POST['Age'];
					$varGender=$_POST['Gender'];
					$varStatus=$_POST['Status'];
					$varOrientation=$_POST['Orientation'];
					$varSmoke=$_POST['Smoke'];
					$varAlcohol=$_POST['Alcohol'];
					$varHard=$_POST['Hard'];


					//This function kills the program if called and prints out the errors that caused it
				   function died($error) {
			        echo "These errors appear below.<br /><br />";
			        echo $error."<br /><br />";
			        echo "Please go back and fix these errors.<br /><br />";
			        die();
			    	}//end died
			     
			    	// This if statement checks to see if the fields are entered
			    	if(empty($_POST['FirstName']) || !isset($_POST['Gender']) || !isset($_POST['Status']) || empty($_POST['LastName']) || empty($_POST['City']) || empty($_POST['Job']) || empty($_POST['Age']) )
			    	{
			        	died('You forgot a field!');       
			    	}//End if

			    	//The following section reads data from the from and creates a story
					echo "<p>Well ";
					//Adds a prefix
					if($varGender==Male){
						echo"Mr. ";
					}
					elseif($varGender==Female && $varStatus==Single) {
						echo"Ms. ";
					}
					else{
						echo"Mrs. ";
					}

					echo "$varLName, have we a match for you!</p><br />";

					echo "<p>Your future lover also lives in $varCity.";

					echo " They will be around $varAge years of age.";

					//Wants to know what gender you want to paired up with
					if (($varGender==Male && $varOrientation==Gay) || ($varGender==Male && $varOrientation==Gay)) {
						echo "He will the most handsome man you have ever laid eyes on.";
					}
					elseif ($varOrientation==Questioning) {
						echo"So you don't know who they will be yet, doesn't matter. When you find this person you will know that they are the perfect person for you.";
					}
					else{
						echo" She will the most beautiful woman you have ever laid eyes on.";
					}

					echo " More than likely they will also be a $varJob. The evenings will start off will the two of you talking about your field, and will eventually blossom into amazing converstaions about life and the world itself. You will find it difficult to part yourself from this person.";


					//I made the drug ones pretty simple, adds the sentences if you do one of these things
					if($varSmoke==Smoke){
						echo " They will either smoke themselves or be totally ok with your habit. Later on down the road they may decide that they really want you to quit for your health.";

					}

					if($varAlcohol==Alcohol){
						echo " They will enjoy a drink from time to time or be ok with you drinking. If your drinking stays at a moderate level they will leave you alone, but if it becomes a problem AA meetings are in your future.";

					}

					if($varHard==Hard){
						echo " They will tolerate your hard drug habit or have a problem themselves. Eventually the two of you will blissfully die due to overdose, or your habit will create money problems that push them away.";

					}

					//Checks to see if you are married and print out text
					if ($varStatus==Married) {
						echo"Your current spouse will be furious, and your children (if you have any) will hate you for the rest of your life, but at least you'll be happy right?";
					}

					echo"</p>";

				   
				}

				?>

			</div><!--rightcont End Tag-->

		</div><!--rightcol End Tag-->

</div> <!--body End Tag -->

<div id="footer">

	<div id="footercont">

		<p>
			Albert Miller 
		</p>

	</div><!--footercont End Tag -->

</div><!--footer End Tag -->

</div><!--container End Tag -->

</body>
</html>