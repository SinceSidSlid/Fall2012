<?php

include 'dbconnect.php';


$link = mysql_connect($host, $username, $password);
if (!$link) {
    die('Could not connect'. mysql_error());
}

echo 'Connected';
echo "<br />";




$db_selected = mysql_select_db('ug37',$link);
if(!$db_selected){
    die('Can\'t use employer:' . mysql_error());
}


$Employee = '1';

switch ($Employee) {
			case "1":
				$query = "select Fname, Lname, members.E_ID, count(*) from members, employee where employee.E_ID = members.E_ID group by E_ID having count(*) > 1;";
				break;
			case '2':
				$query ="select Fname, Lname from employee where E_ID not in (select E_ID FROM members);";
				break;
			case '3':
				if (isset($_POST['Q2'])) {
					$query="select employee.Lname as Lname, employee.Fname as Fname, project.Pname as Pname from members
					inner join project on members.P_ID = project.P_ID
					inner join employee on members.E_ID = employee.E_ID
					where P_ID = $varProj;";
				}
				else
				{
					$query = "select * from employees";

					if ($_POST['Q1']) 
					{
						$query.="where Dept = '$varDept'";
					}

					$query.=";";
				}
				break;
			default:
				print '<br />test1';
				break;
		}

echo "Query is ".$query;
$result = mysql_query($query);


if(!$result){
    $message='Invalid Query' .mysql_errno()."\n";
    $message .= 'Whole Query' . $query;
    die($message);
}

while ($row = mysql_fetch_assoc($result)){
    		print $row['Fname'];
			print $row['Lname'];
			print $row['E_ID'];
			print $row['count(*)'];
}







?>