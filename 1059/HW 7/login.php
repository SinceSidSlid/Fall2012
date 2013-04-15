<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>

     <?php
     	$varUname = $_POST['Username'];
     	$varPword = $_POST['Password'];
      ?>

<form name="login" action="Query.php" method="post" enctype="multipart/form-data">
<table>

		<tr>
			<td><p>Username</p></td><td><input type="text" name="Username" value="<?=$varUname;?>" size="25" maxlength="25" /></td>
		</tr>

		<tr>
			<td><p>Password</p></td><td><input type="password" name="Password" value="<?=$varPword;?>" size="25" maxlength="25" /></td>
		</tr>

</table>
<p><input type="submit" name="Push" value="Push" /></p>
</form>

</body>
</html>