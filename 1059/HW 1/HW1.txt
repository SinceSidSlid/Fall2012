<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!--  <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" /> --> 
	<title>Homework 1</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />
	<script type="text/javascript">
	/* <![CDATA[ */

	/* ]]> */
	</script>

</head>

<body>

<?php

$AB = 318;
$Hit = 108;
$Double = 29;
$Triple= 0;
$HR = 14;
$BB = 23; /* Walks */
$HBP = 15; /* Hit By Pitch */
$SF = 4; /* Sac Fly */

define("NAME", "Carlos Ruiz");

echo "<p> ", NAME , " plays for the Philadelphia Phillies and has the following stats:</p>";

$AVG = number_format(($Hit/$AB), 3); //Average is Hits divided by official at bats.
$OBP = number_format((($Hit + $BB + $HBP)/($AB + $BB +$HBP + $SF)), 3); //On Base Percentage is calculated by dividing all hits, walks, and hit by pitches by the number of at bats total and sac flies 
$SLG = number_format( ( ( ($Hit - $Double - $HR - $Triple) + 2*$Double + 3*$Triple + 4*$HR) / $AB), 3); //Slugging is Total Bases divided by offical at bats
$OPS = number_format(($OBP + $SLG), 3); //On Base plus Slugging self explanitory

echo"<p>At Bats: ",$AB,"</p>";
echo"<p>Hits: ",$Hit,"</p>";
echo"<p>Doubles: ",$Double,"</p>";
echo"<p>Triples: ",$Triple,"</p>";
echo"<p>Home Runs: ",$HR,"</p>";
echo"<p>Walks: ",$BB,"</p>";
echo"<p>Average: ",$AVG,"</p>";
echo"<p>On Base Percentage: ",$OBP,"</p>";
echo"<p>Slugging Percentage: ",$SLG,"</p>";
echo"<p>On Base Plus Slugging: ",$OPS,"</p>";

?>

</body>