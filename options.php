<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>
	<?php 
	session_start();
	require_once "db.php";
	error_reporting(E_ALL ^ E_NOTICE);			
	
	$username = $_SESSION['username'];
	if ( ! isset($_SESSION["username"]) ) 
		{ ?> <div style="white-space: pre" />
           Please <a href="loginhtml.php">Log In</a> to start. <br>
<?php   } 
	else
	{ ?>
	
				<div id="myform">
					<a href="search.php">Search for a book</a></br>
					<a href="display.php">Reserve a book</a></br>
					<a href="view.php">View reserved books</a></br></br>
					<input type="button" value="Logout"
					onclick="location.href='logout.php'; return false ">
				</div>
	
	<?php } ?>		
			<div id="footer">
				<div id="button">
					<p>Send us an <span class="bold">e-mail</span>!</p>
				</div>
			</div>
</body>
</html>
