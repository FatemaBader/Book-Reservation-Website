<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>

<?php session_start();
require_once "db.php";
error_reporting(E_ALL ^ E_NOTICE);			
	
	$username = $_SESSION['username'];
	if ( ! isset($_SESSION["username"]) ) 
		{ ?> <div style="white-space: pre" />
           Please <a href="loginhtml.php">Log In</a> to start. <br>
<?php   } 
	else
	{ 
		$username = $_SESSION['username'];

		$con = mysqli_connect('localhost', 'root', '', 'book');
		echo 'Username: ' . $username;
		echo '<br>Available Library Books:<br><br>' ;


		//•	View all available books – the system should allow the user to see a
		// list of the book(s) currently available 
			
				$results = mysqli_query($con,"SELECT * FROM BOOKS 
				 WHERE reserved='N'")
				or die(mysqli_error());

		if(mysqli_num_rows($results) > 0)
		{ // if one or more rows are returned do following
					 echo '<table border="1">'."\n";
					while ( $row = mysqli_fetch_row($results) ) {
						echo "<tr><td>";
						echo($row[0]);
						echo("</td><td>");
						echo($row[1]);
						echo("</td><td>");
						echo($row[2]);
						echo("</td><td>");
						echo($row[3]);
						echo("</td><td>");
						echo($row[4]);
						echo("</td><td>");
						echo($row[5]);
						echo("</td><td>");
						echo($row[6]);
						echo("</td>");
						echo ("<td>".'<a href="reserve.php
							?id='.htmlentities($row[0]).'
							">Reserve</a>'."</td>");
						}
						echo("</tr>\n");
						
						echo "</table>\n";

		}
		else
		{
			//error check
			echo " All books reserved. No books available at this time.";
		}
	}
?>

<div id="footer">
			<div id="button">
				<p>Send us an <span class="bold">e-mail</span>!</p>
			</div>
		</div>

</body>
</html>