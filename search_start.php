<?php session_start();
require_once "db.php";

$query = $_GET['query']; 
$query2 = $_GET['query2']; 

$raw_results = mysql_query("SELECT * FROM books
            WHERE (`title` LIKE '%".$query."%') AND
			(`author` LIKE '%".$query2."%') ") or die(mysql_error());
			
			//error check 
			if(mysql_error()) 
			{
				echo "no results";
			}
if(mysql_num_rows($raw_results) > 0)
{ // if one or more rows are returned do following
             echo '<table border="1">'."\n";
			while ( $row = mysql_fetch_row($raw_results) ) {
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
				echo("</td>");
				
				if($row[6]=="N")
				{
					echo ("<td>".'<a href="reserve.php
					?id='.htmlentities($row[0]).'
					">Available</a>'."</td>");
				}
				if($row[6]=="Y")
				{
					echo ("<td>Reserved</td>");
				}
				echo("</tr>\n");
				}
				echo "</table>\n";

}
// else{ // if there is no matching rows do following
		//echo "No results";
   //}			

mysql_close($db);
?>