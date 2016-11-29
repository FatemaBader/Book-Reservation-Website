<?php 
session_start();

require_once "db.php";

unset($_SESSION["username"]);

if ( isset($_POST["username"]) && isset($_POST["password"]) )
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$res= mysql_query("SELECT * FROM users WHERE username='$username' 
	AND password='$password'")
		or die("Failed to query database".mysql_error());
	$row=mysql_fetch_array($res);
	if ($row!=0)
	{	
		echo "Login success!! Welcome ".$row['username'];
		$_SESSION["success"] = "Logged in.";
		$_SESSION["username"] = $_POST["username"];
		header( 'Location: options.html' ) ;
		return;
	}
	else
	{
		echo "Invalid Login. Please register.";
		//exit();
		$_SESSION["error"] = "Incorrect password.";
		//echo('<p style="color:red">Error:'.
		//$_SESSION["error"]."</p>\n");
		header( 'Location: loginhtml.php' ) ;
		return;
	} 
}
else if ( count($_POST) > 0 )
{ 
	$_SESSION["error"] = "Missing Required Information";
	header( 'Location: loginhtml.php' ) ;
	return;
}

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>
	<div id="myform">
	<h2><b>Log In<b></h2>
	<?php
		if ( isset($_SESSION["error"]) ) {
		echo('<p style="color:red">Error:'.
		$_SESSION["error"]."</p>\n");
		unset($_SESSION["error"]);
		}
	?>
		<form  method="POST"  >
		<p>
			<label>Username:</label>
			<input type="text" id="username" name="username" required></br>
		</p>
		<p>
			<label>Password:</label>
			<input type="password" id="password" name="password" required></br>
		</p>
		<p>
			<input type="submit" id="button" value="Login" >
		</p>
		
		<a href="add.php">Registration</a>
		</form>
	</div>
	<!--<a href="options.html">Login</a></br>-->
</body>
</html>	

