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
$username = $_SESSION['username'];

$con = mysqli_connect('localhost', 'root', '', 'book');
echo 'Username:' . $username;


//•	View reserved books – the system should allow the user to see a
// list of the book(s) currently reserved by that user. 
	
	//display books
	// 3 clumns row0,row1,row2
		$results = mysqli_query($con,"SELECT ISBN,TITLE,AUTHOR,RDATE FROM BOOKS 
		JOIN RESERVED USING(ISBN) WHERE USERNAME='$username'")
		or die(mysqli_error());

		//$row=mysqli_fetch_array($results);
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
				
				echo ("<td>".'<a href="unreserve.php
					?id='.htmlentities($row[0]).'
					">Remove Reservation</a>'."</td>");
				}
				echo("</tr>\n");
				
				echo "</table>\n";

}
else
{
	//error check
	echo " <br>No books reserved by user: $username <br><br><br><br> " ;
}
	
?>
<input type="button" value="Logout"
		onclick="location.href='logout.php'; return false ">
<div id="footer">
			<div id="button">
				<p>Send us an <span class="bold">e-mail</span>!</p>
			</div>
		</div>

</body>
</html>