<?php

$myString = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">

<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>

<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />

<title>Sidebar</title>

<style type=\"text/css\">

body {

	font-family: Tahoma, \"Lucida Grande\", Arial, sans-serif;

	font-size: 62.5%;

	margin: 0;

	padding: 0;

	background-color: white;

	background-image:url(http://www.sis.pitt.edu/~perkoski/images/page.jpg);

	background-repeat: repeat-x;

	background-position: left top;

	text-align: center;



}



#wrapper {

	width: 760px;

	margin: 15px auto 0 auto;

	background: #fff url(images/wrapper_bg.gif) center top no-repeat;

	text-align: left;





}



h1 {

	font-size: 2.4em;

	margin: 0;

	padding: 5px 0 5px 25px;

	background-color: #555566;

	color: #FFF;

	border: 1px solid #E73A10;

}



h2 {

	font-size: 1.8em;

	color:#556677;

	margin: 10px 5px 0 25px;

	overflow: hidden;

	border-bottom: 1px solid #AE00F6;

}



p {

	font-size: 1.2em;

	line-height: 130%;

	margin-top: 0;

	margin-bottom: 10px;

	margin-left: 25px;

}



p.copyright {

	color: #AE00F6;

	font-size: 0.9em;

	text-transform:uppercase;

	border-top: solid 1px #ccc;

}



.sidebar {

	width: 220px;

	float: right;

	margin: 10px;

	background-color: #CCCCCC;

	border: 1px solid #7BA505;

	padding: 10px;

}



.sidebar h3 {

	font-size: 1.4em;

	margin: 0;

	text-align: center;

	text-transform: uppercase;

}



.sidebar ul {

	color: #666;

	font-size: 1.2em;

	margin: 0;

	padding: 10px 5px 0 5px;

}



.sidebar li {

	margin-left: 10px;

	margin-bottom: 6px;

}





/*CSS Hacks for Internet Explorer */



/* fix the over extended h2 borders */

* html h2 {

	zoom: 1;

}



* html .sidebar {

/* double margin bug fix */

	display: inline;





}



.lister {

	font-family:Tahoma, \"Lucida Grande\", Arial, sans-serif;

	font-size: 1.2em;

	line-height: 130%;



}

.picture {

	margin-top: 10px;

	margin-left: 5px;

	border:solid 1px;

	border-color:#555566;

}



</style>

</head>


<body>

<div id=\"wrapper\">



<h1>Undergraduate Information Science Program <br /> Program Chair: Robert R. Perkoski</h1>



<div class=\"sidebar\">

    <h3> Contact Information</h3>

    <ul>

      <li>Email: perks@pitt.edu</li>

      <li>Phone: 412-624-9425</li>

      <li>Office: Room 503 LIS Bldg</li>

    </ul>

  </div>



  <img src=\"http://www.sis.pitt.edu/~perkoski/images/perkoski.jpg\" width=\"120\" height=\"135\" class = \"picture\"/>


  <img style=\"margin-left:10px;\" src=\"http://www.sis.pitt.edu/~perkoski/images/IS_Sig.gif\" width=\"300\" height=\"135\" >



  <h2>Classes Taught Fall Term 2010</h2>

  <ul class =\"lister\">



  <li> <a href=\"http://www.sis.pitt.edu/~perkoski/is1052/Syllabus/IS1052_Fall2012.html\">INFSCI

      1052</a> User Centered Design </li>

  <li> <a href=\"http://www.sis.pitt.edu/~perkoski/is1092/Fall2012.html\">INFSCI 1059 </a> Web Programming</li>

  </ul>













 <h2>Welcome</h2>

  <p>I would like to welcome visitors to this page and the Undergraduate Program in Information Science program. This is an exciting time for our program and for graduating students. The economic outlook for graduates this year is very positive and students are excited about the myriad of opportunities. Our graduates are working in the production and  service industries holding positions as systems analysts, programmers, web designers, network analysts and more..</p>

  <p>The curriculum focuses on core skills such as database, systems analysis, programming and networks. In addition there is an opportunity to focus on a concentration such as business systems, web systems or networks/security. And, all students participate in a capstone experience where they obtain an internship with a company, enroll in a capstone course or conduct an independent research study.</p>



  <h2>Interests</h2>

  <p>I have a strong interest in both the technical area as well as business. Previously, I worked in Career Services and interacted with companies and corporations acrosss the United States. In particular, I studied the technical market and developed a strong background in corporate technology, hiring patterns, and needed skill sets. In addition, I completed graduate work in Information Science with a particular interest in interface design, visual systems, adaptive systems and visual frameworks. I enjoy the opportunity to teach undergraduate students and to motivate individuals in becoming talented, vital, employees. Because we are a competitive program many of our students continue their education at some of the better graduate institutions. I am proud and excited that our students continue to be some of the best graduates in the field, ready to lead and ready to make a contribution.</p>

  <p>&nbsp;</p>

  <p class=\"copyright\">Copyright 2008</p>

  </div>

</body>

</html>

";


	function replaceString($myString)
	{
		$replaceString = str_replace('INFSCI','Information Science', $myString);
		echo "$replaceString";
	}//Here I used the str_replace function to find all instances of INFSCI and replace it with Information Science. Then I echoed the new String.

	function printCSS($myString)
	{
		$start = strpos($myString, "<style");
		$end = strpos($myString, "</style");
		$array = str_split($myString);
		$count = count($array);

		for($i=0; $i<$count; $i++)
		{
			if($i > $start && $i < $end)
			{
				echo "$array[$i]";
			}// End if. This check to see if the position in the array is between the start and end of the style sheet.
			//If this is the case print out the letter in the array

		}//End for

	}//The variables declared at the beginning allow the for loop to run.

	replaceString($myString);
	printCSS($myString);




?>