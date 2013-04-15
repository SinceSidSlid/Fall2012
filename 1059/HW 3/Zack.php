<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cities in States</title>
<style>#container{text-align:center;}</style>
</head>
<body>
<div id="container">
<?php

	function PresentInfo($st, $ci)
	{
		if($st=='PA')
		{
		echo "<h1>Pennsylvania</h1><p>Pennsylvania, officially the Commonwealth of Pennsylvania, is a US state that is located in the Northeastern and Mid-Atlantic regions of the United States, and the Great Lakes region</p>";
		
		if($ci=="Pittsburgh")
		echo "<h2>Pittsburgh</h2><p>Pittsburgh is the second-largest city in the U.S. Commonwealth of Pennsylvania and the county seat of Allegheny County. Regionally, it anchors the largest urban area of both Appalachia and the Ohio River Valley.</p>";
		if($ci=="Harrisburg")
		echo "<h2>Harrisburg</h2><p>Harrisburg is the capital city of Pennsylvania. As of the 2010 census, the city had a population of 49,528, making it the ninth-largest city in Pennsylvania.</p>";
		if($ci=="Philadelphia")
		echo "<h2>Philadelphia</h2><p>Philadelphia is the largest city in the Commonwealth of Pennsylvania and the fifth-most-populous city in the United States.</p>";
		
		}
		else if($st=='NY')
		{
		echo "<h1>New York</h1><p>New York is a state in the Northeastern region of the United States. New York is the 27th most extensive, the 3rd most populous, and the 7th most densely populated of the 50 United States.</p>";
		
		if($ci=="NYC")
		echo "<h2>New York City</h2><p>New York is the most populous city in the United States of America and the center of the New York Metropolitan Area, one of the most populous metropolitan areas in the world. The city is referred to as New York City or The City of New York to distinguish it from the State of New York, of which it is a part.</p>";
		if($ci=="Albany")
		echo "<h2>Albany</h2><p>Albany is the capital city of the U.S. state of New York, the seat of Albany County, and the central city of New York's Capital District.</p>";
		if($ci=="Rochester")
		echo "<h2>Rochester</h2><p>Albany is the capital city of the U.S. state of New York, the seat of Albany County, and the central city of New York's Capital District.</p>";
		
		}
		else if($st=='OH')
		{
		echo "<h1>Ohio</h1><p>Ohio is a state in the Midwestern United States. Ohio is the 34th most extensive, the 7th most populous, and the 10th most densely populated of the 50 United States. The state's capital and largest city is Columbus</p>";
		
		if($ci=="Columbus")
		echo "<h2>Columbus</h2><p>Columbus is the capital of and the largest city in the U.S. state of Ohio. The broader metropolitan area encompasses several counties and is the third largest in Ohio behind those of Cleveland and Cincinnati. Columbus is the fifteenth largest city in the United States of America.</p>";
		if($ci=="Toledo")
		echo "<h2>Toledo</h2><p>Toledo is the fourth most populous city in the U.S. state of Ohio and is the county seat of Lucas County. Toledo is in northwest Ohio, on the western end of Lake Erie, and borders the State of Michigan.</p>";
		if($ci=="Cincinnati")
		echo "<h2>Cincinnati</h2><p>Cincinnati is a city in and the county seat of Hamilton County, Ohio, United States. Settled in 1788, the city is located on the north bank of the Ohio River at the Ohio-Kentucky border, near Indiana.</p>";
		
		}
	}

	if($_POST['Submit'] == "Submit")
	{
		$state=$_POST['State'];
		$varName=$_POST['YourName']; //For keeping the Text Box sticky
		$city=$_POST['City'];
		
		if (isset($state) && $state != "Select") // This is to make the Select Box sticky (retain values)
		{
			if ($state == 'PA')
			{
					$pa = 'selected';
					if(!isset($city) || $city=="Select")
					PresentInfo("PA");
					if($city=="Pittsburgh")
					{
						$pgh='selected';
						PresentInfo("PA","Pittsburgh");
						
					}
					if($city=="Harrisburg")
					{
						$hbg='selected';
						PresentInfo("PA","Harrisburg");
						
					}
					if($city=="Philadelphia")
					{
						$phi='selected';
						PresentInfo("PA","Philadelphia");
						
					}
			}
			elseif ($state == 'NY')
			{
					$ny = 'selected';
					if(!isset($city) || $city=="Select")
					PresentInfo("NY");					
					if($city=="NYC")
					{
						$nyc='selected';
						PresentInfo("NY","NYC");
						
					}
					if($city=="Albany")
					{
						$alb='selected';
						PresentInfo("NY","Albany");
						
					}
					if($city=="Rochester")
					{
						$roc='selected';
						PresentInfo("NY","Rochester");
						
					}
			}
			else
			{
					$oh = 'selected';
					if(!isset($city) || $city=="Select")
					PresentInfo("OH");					
					if($city=="Columbus")
					{
						$colu='selected';
						PresentInfo("OH","Columbus");
						
					}
					if($city=="Toledo")
					{
						$tol='selected';
						PresentInfo("OH","Toledo");
						
					}
					if($city=="Cincinnati")
					{
						$cinc='selected';
						PresentInfo("OH","Cincinnati");
						
					}
			}
		}
		else
		{
			echo "<h1>Please select a state.</h1>"; //If the user has not selected a state, this is presented
		}
	}
?>
<form action="citystate.php" method="post">
<h2>Please enter your name, and select a state.</h2>
<input type="text" name="YourName" value="<?=$varName;?>" size="25" maxlength="50" /><br /><br />
<select name="State">
<option value="Select">Select a State</option>
<option value="PA" <?=$pa?>>Pennsylvania</option>
<option value="NY" <?=$ny?>>New York</option>
<option value="OH" <?=$oh?>>Ohio</option>
</select><br />
<?php
		if (isset($state) && $state != "Select")//Do not display if no state selected
		{
		echo "<h2>Please select a city.</h2><select name=\"City\">";//Echo start of select
			if ($state == 'PA')
			{
				echo"
				<option value=\"Select\">Select a City</option>
				<option value=\"Harrisburg\" $hbg>Harrisburg</option>
				<option value=\"Pittsburgh\" $pgh>Pittsburgh</option>
				<option value=\"Philadelphia\" $phi>Philadelphia</option></select><br />";
			}
			elseif ($state == 'NY')
			{
				echo"
				<option value=\"Select\">Select a City</option>
				<option value=\"NYC\" $nyc>New York City</option>
				<option value=\"Albany\" $alb>Albany</option>
				<option value=\"Rochester\" $roc>Rochester</option></select><br />";
			}
			else
			{
				echo"
				<option value=\"Select\">Select a City</option>
				<option value=\"Columbus\" $colu>Columbus</option>
				<option value=\"Toledo\" $tol>Toledo</option>
				<option value=\"Cincinnati\" $cinc>Cincinnati</option></select><br />";	
			}		
	}
?>
<br />
<input type="submit" name="Submit" value="Submit" />
</form>
</div>
</body>
</html>