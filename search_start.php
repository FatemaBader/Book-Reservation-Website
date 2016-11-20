<?php
require_once "db.php";

if(isset($GET['query']))
{
	
	

	// gets value sent over search form
	$query = $_GET['query']; 

	$raw_results = mysql_query("SELECT 'title' FROM books
            WHERE (`title` LIKE '%".$query."%')") or die(mysql_error());

	if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$raw_results."</h3>"."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }			
}			
/*echo '<table border="1">'."\n";

$result = mysql_query("SELECT * FROM
books");

while ( $row = mysql_fetch_row($result) ) {
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
	echo("</tr>\n");
}
echo "</table>\n";*/
//mysql_close($db);
?>