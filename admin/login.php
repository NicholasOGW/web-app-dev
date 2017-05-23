<?php
session_start();
include('../includes/db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php
$error = "";
$conn = initdb();

if($_SERVER["REQUEST_METHOD"] == "POST"):
	$username = $conn->real_escape_string($_POST['username']);
	$password = md5($conn->real_escape_string($_POST['password']));
	
	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	if($stmt = $conn->prepare($sql)):
		if($stmt->bind_result($id, $username, $password)):
			if($stmt->execute()):
				if($stmt->fetch()):
					$_SESSION["id"]=$id;
					$_SESSION["login_user"]=$username;
					header("Location:index.php");
				else:
					echo "<script>alert('Username or password is invalid!');</script>";
				endif;
			else:
				die('execute() failed: ' . htmlspecialchars($stmt->error));
			endif;
		else:
			die('bind_result() failed: ' . htmlspecialchars($stmt->error));
		endif;
	else:
		die("prepare() failed: " . htmlspecialchars($conn->error) );
	endif;
endif;
?>


<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td>
<form name="form1" method="post">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td colspan="3"><strong>Login </strong></td>
</tr>
<tr>
<td width="71">username</td>
<td width="6">:</td>
<td width="301"><input name="username" type="text" id="username"></td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="Password"></td>
</tr>

<tr>
<td colspan="3" align="center"><input type="submit" name="cf_submit" value="Login"></td>
</tr>
</table>
</form>
</td>
</tr>

</table>

</body>
</html>