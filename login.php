<?php session_start();

require_once "db.php";

unset($_SESSION["username"]);
$username=($_SESSION($_POST["username"])
$password=($_SESSION($_POST["password"])

$res= mysql_query("SELECT * FROM users WHERE username='$username' 
	AND password='$password'")
		or die("Failed to query database".mysql_error());
$row=mysql_fetch_array($res);

if ( isset($_POST["username"]) && isset($_POST["password"]) )
{
	if ($row['username']==$username && $row['password']==$password)
	{	
		echo "Login success!! Welcome ".$row['username'];
		$_SESSION["success"] = "Logged in.";
		header( 'Location: options.html' ) ;
		return;
	}
	else
	{
		//echo "Invalid Login. Please register.";
		//exit();
		$_SESSION["error"] = "Incorrect password.";
		//echo('<p style="color:red">Error:'.
		//$_SESSION["error"]."</p>\n");
		header( 'Location: login.php' ) ;
		return;
	} 
}
else if ( count($_POST) > 0 )
{ 
$_SESSION["error"] = "Missing Required Information";
header( 'Location: login.php' ) ;
return;
}

?>

