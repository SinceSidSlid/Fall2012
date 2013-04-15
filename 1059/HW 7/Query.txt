<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Queries</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

<?php

include 'dbconnect.php';

$varUname = $_POST['Username'];
$varPword = $_POST['Password'];

$link = mysql_connect($host, $username, $password);
if (!$link) {
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

$query = "select Username, Password from login where Username = '$varUname' and Password = '$varPword';";
$result = mysql_query($query);
$c = mysql_num_rows($result);

if(!$result){
    $message='Invalid Query' .mysql_errno()."\n";
    $message .= 'Whole Query' . $query;
    die($message);
}

if($c == 1)
{
	print"<p>Welcome ".$varUname."</p>";
}
else
{
	print"<p>Failed ".$varUname."</p>";
}

?>


<h1>Select from ONE of the three boxes below</h1>

<form name="querystuff" action="Query.php" method="post" enctype="multipart/form-data">

<h2>Employee Questions</h2>
<select name="employee">
	<option value='0' <?php if($_POST['employee']=="0") echo 'selected=\'selected\'' ?>></option>
	<option value='1' <?php if($_POST['employee']=="1") echo 'selected=\'selected\'' ?>>On Multiple Projects</option>
	<option value='2' <?php if($_POST['employee']=="2") echo 'selected=\'selected\'' ?>>Free to Work on a Project</option>
	<option value='3' <?php if($_POST['employee']=="3") echo 'selected=\'selected\'' ?>>List of Employees</option>
</select>

<h2>Department Questions</h2>
<select name="department">
	<option value='0' <?php if($_POST['department']=="0") echo 'selected=\'selected\'' ?>></option>
	<option value='1' <?php if($_POST['department']=="1") echo 'selected=\'selected\'' ?>>No Projects</option>
	<option value='2' <?php if($_POST['department']=="2") echo 'selected=\'selected\'' ?>>Employees Working on a Project</option>
	<option value='3' <?php if($_POST['department']=="3") echo 'selected=\'selected\'' ?>>Employees Not Working on a Project</option>
</select>

<h2>Project Questions</h2>
<select name="project">
	<option value='0' <?php if($_POST['project']=="0") echo 'selected=\'selected\'' ?>></option>
	<option value='1' <?php if($_POST['project']=="1") echo 'selected=\'selected\'' ?>>By Budget</option>
	<option value='2' <?php if($_POST['project']=="2") echo 'selected=\'selected\'' ?>>Over Budget</option>
	<option value='3' <?php if($_POST['project']=="3") echo 'selected=\'selected\'' ?>>Finshed</option>
	<option value='4' <?php if($_POST['project']=="4") echo 'selected=\'selected\'' ?>>Average Cost</option>
</select>

<?php
	print'<h3>Specific Department:</h3>';

	print '<p> Public Relations<input type="radio" name="Q1" value="PR" '; 
	if ($_POST['Q1'] == 'PR') echo 'checked="checked"'; //Check if PR for sticky radio button
	print '/>'; 

	print '<br /> Human Resources <input type="radio" name="Q1" value="HR" ';
	if ($_POST['Q1'] == 'HR') echo 'checked="checked"'; //Check if HR for sticky radio button
	print '/>';
						
	print '<br /> Information Technology<input type="radio" name="Q1" value="IT" ';
	if ($_POST['Q1'] == 'IT') echo 'checked="checked"'; //Check if IT for sticky radio button
	print '/>';

	print '<br /> Marketing <input type="radio" name="Q1" value="Marketing" ';
	if ($_POST['Q1'] == 'Marketing') echo 'checked="checked"'; //Check if Marketing for sticky radio button
	print '/></p>';	


	print'<h3>Specific Project:</h3>';

	print '<p> Space Allocation<input type="radio" name="Q2" value="1" '; 
	if ($_POST['Q2'] == '1') echo 'checked="checked"'; //Check if 1 for sticky radio button
	print '/>'; 

	print '<br />Health and Safety <input type="radio" name="Q2" value="2" ';
	if ($_POST['Q2'] == '2') echo 'checked="checked"'; //Check if 2 for sticky radio button
	print '/>';
						
	print '<br />New Product <input type="radio" name="Q2" value="3" ';
	if ($_POST['Q2'] == '3') echo 'checked="checked"'; //Check if 3 for sticky radio button
	print '/>';

	print '<br />New Computer <input type="radio" name="Q2" value="4" ';
	if ($_POST['Q2'] == '4') echo 'checked="checked"'; //Check if 4 for sticky radio button
	print '/></p>';	


	print "<input type=\"hidden\" name=\"Username\" value=\"$varUname\">";
	print "<input type=\"hidden\" name=\"Password\" value=\"$varPword\">";
	
?>
<p><input type="submit" name="Submit" value="Submit" /></p>
</form>

<?php

$varDept = $_POST['Q1'];
$varProj = $_POST['Q2'];
$Department = intval($_POST['department']);
$Project = intval($_POST['project']);
$Employee = intval($_POST['employee']);

	//This function echos back any errors to the user and then ends the program
	//The input are any errors detected, and they are strings
	//It returns nothing
	function died($error)
	{
		var_dump($_POST);
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}//end died
	
	//This function checks what option you picked and makes sure you only picked one
	//There is no input
	//There is no return
	function boxselect()
	{
		$a = 0;

		if($_POST['department']!='0')
		{
			$a += 1;
		}

		if($_POST['employee']!='0')
		{
			$a += 1;
		}

		if($_POST['project']!='0')
		{
			$a += 1;
		}

		if($a>1)
		{
			died('You picked too many questions!');
		}
		else if($a<=0)
		{
			died('You didn\'t pick any questions!');
		}

	}//end boxselect

	function varselect()
	{

		$b = 0;

		if (isset($_POST['Q1'])) 
		{
			$b+=1;
		}
		if (isset($_POST['Q2'])) 
		{
			$b+=1;
		}

		if($b>1)
		{
			died('You got too specific, try clicking only one!');
		}
	}

	//This function looks at the from data and creates the query
	//There is no input
	//It returns the string query


		switch ($Employee) 
		{
			case 1:
				$query = "select Fname, Lname, members.E_ID, count(*) from members, employee where employee.E_ID = members.E_ID group by E_ID having count(*) > 1;";
				break;
			case 2:
				$query ="select Fname, Lname from employee where E_ID not in (select E_ID FROM members);";
				break;
			case 3:
				if (isset($_POST['Q2'])) {
					$query="select employee.Fname as Fname, employee.Lname as Lname, project.Pname as Pname from members
					inner join project on members.P_ID = project.P_ID
					inner join employee on members.E_ID = employee.E_ID
					where members.P_ID = $varProj;";
				}
				else
				{
					$query = "select * from employee";

					if ($_POST['Q1']) 
					{
						$query.=" where Dept = '$varDept'";
					}

					$query.=";";
				}
				break;
			default:
				break;
		}

		switch ($Department)
		{
			case 1:
				$query ="select distinct Dept from employee where Dept not in (select project.Dept from project, employee where employee.Dept = project.Dept);";
				break;
			case 2:
				$query ="select Dept, Fname, Lname FROM employee where E_ID in (select members.E_ID from members);";
				break;
			case 3:
				$query ="select Dept, Fname, Lname FROM employee where E_ID not in (select members.E_ID from members);";
				break;
			default:
				break;
		}

		switch ($Project) 
		{
			case '1':
				$query ="select Pname, budget from project order by budget desc;";
				break;
			case '2':
				$query ="select Pname, spent, budget from project where spent>budget;";
				break;
			case '3':
				$query ="select Pname, DueDate from project where DueDate < NOW();";
				break;
			case '4':
				$query ="select Dept, avg(budget) as Average from project";
				if ($_POST['Q1']) 
					{
						$query.=" where Dept = '$varDept'";
					}

				$query.=";";
				break;
			default:
				break;
				
		}


if($_POST['Submit'] == "Submit")
{

	
	boxselect();
	varselect();
	print '<br />The query is '.$query;
	$results = mysql_query($query);

if(!$results){
    $message='Invalid Query' .mysql_errno()."\n";
    $message .= 'Whole Query' . $query;
    die($message);
}



	print '<table>';

		if ($Employee==1) 
		{
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print'<td>'.$row['E_ID'].'</td>';
				print'<td>'.$row['count(*)'].'</td>';
				print "</tr>";
			}

		}
		elseif ($Employee==2) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Employee==3 && isset($_POST['Q2'])) {
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print'<td>'.$row['Pname'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Employee==3 && isset($_POST['Q1'])) {
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['E_ID'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Dept'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Employee==3 && !isset($_POST['Q1']) && !isset($_POST['Q2'])) {
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['E_ID'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Dept'].'</td>';
				print "</tr>";
			}
		}

		elseif ($Department==2 || $Department==3) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Dept'].'</td>';
				print'<td>'.$row['Fname'].'</td>';
				print'<td>'.$row['Lname'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Department==1) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Dept'].'</td>';
				print "</tr>";
			}
		}

		elseif ($Project==1) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Pname'].'</td>';
				print'<td>'.$row['budget'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Project==2) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Pname'].'</td>';
				print'<td>'.$row['spent'].'</td>';
				print'<td>'.$row['budget'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Project==3) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Pname'].'</td>';
				print'<td>'.$row['DueDate'].'</td>';
				print "</tr>";
			}
		}
		elseif ($Project==4) {
			
			while($row = mysql_fetch_array($results))
			{
				print'<tr>';
				print'<td>'.$row['Dept'].'</td>';
				print'<td>'.$row['Average'].'</td>';
				print "</tr>";
			}
		}
		print'</table>';

}


?>


</body>
</html>