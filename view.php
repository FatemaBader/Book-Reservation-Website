<?php session_start();
require_once "db.php";
$username = $_SESSION['username'];

$con = mysqli_connect('localhost', 'root', '', 'book');
echo 'Username:' . $username;


//•	View reserved books – the system should allow the user to see a
// list of the book(s) currently reserved by that user. 
//User should be able to remove the reservation as well.
	//select isbn,title,author
	//from books
	//join reserved
	//using (isbn)
	//where username LIKE '$username')
	
	//display books
	// 3 clumns row0,row1,row2
		$results = mysqli_query($con,"SELECT ISBN,TITLE,AUTHOR FROM BOOKS 
		JOIN RESERVED USING(ISBN) WHERE USERNAME='$username'");
		//or die(mysql_error());
		
		//error check 
			/*if(mysql_error()) 
			{
				echo "no books reserved by user: $username";
			}*/

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
				echo("</td>");
				}
				echo("</tr>\n");
				
				echo "</table>\n";

}

	
?>