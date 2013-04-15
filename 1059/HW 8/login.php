<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css" />

<?php
	$varUname = $_POST['Username'];
	$varPword = $_POST['Password'];
	$varRUname = $_POST['RUsername'];
	$varRPword = $_POST['RPassword'];
?>

</head>

<body>
	<div class="wrapper">

		<!--Just a Form on this one -->
		
		<section class='login'>

			<h2>Login</h2>

			<form name="login" action="main.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><p>Username:</p></td><td><input type="text" name="Username" value="<?=$varUname;?>" size="25" maxlength="25" /></td>
				</tr>

				<tr>
					<td><p>Password:</p></td><td><input type="password" name="Password" value="<?=$varPword;?>" size="25" maxlength="25" /></td>
				</tr>

				<tr>
					<td colspan='2'><p><input type="submit" name="Push" value="Log In" /></p></td>
				</tr>
			</table>
			</form>
		</section>

		<section class='register'>

			<h2>Register</h2>

			<form name="login" action="register.php" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td><p>Username:</p></td><td><input type="text" name="RUsername" value="<?=$varRUname;?>" size="25" maxlength="25" /></td>
				</tr>

				<tr>
					<td><p>Password:</p></td><td><input type="password" name="RPassword" value="<?=$varRPword;?>" size="25" maxlength="25" /></td>
				</tr>

				<tr>
					<td colspan='2'><p><input type="submit" name="Push" value="Register" /></p></td>
				</tr>
			</table>
			</form>

		</section>

	</div>


</body>
</html>