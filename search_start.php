<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>


<?php 
session_start();
require_once "db.php";
error_reporting(E_ALL ^ E_NOTICE);

$query = $_GET['query']; 
$query2 = $_GET['query2'];

//Error check 
if ( ($query==NULL && $query2==NULL ) )
{
				echo "<br>  No results found. You must search for title or/and author.
				       <br><br><br><br>";
}
else
{
		$page= $_GET["page"];

		if ($page=="" || $page=="1")
		{
			$page1=0;
		}
		else
		{
			$page1=($page*5)-5;
		}

		$raw_results = mysql_query("SELECT * FROM books
					WHERE (`title` LIKE '%".$query."%') AND
					(`author` LIKE '%".$query2."%') LIMIT $page1,5") or die(mysql_error());
					

		/*if(mysql_num_rows($raw_results) == 0)
		{
			echo "no results";
		}*/
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
		else{
			echo "<br> 	No results found.
							<br><br><br><br>    ";
		}

		//counting number of page
		$res1 = mysql_query("SELECT * FROM books
					WHERE (`title` LIKE '%".$query."%') AND
					(`author` LIKE '%".$query2."%') ") or die(mysql_error());

		$cou=mysql_num_rows($res1);
		$a=$cou/5;

		$a= ceil($a);
		echo "<br>"; echo "<br>";

			for($b=1;$b<=$a;$b++)
			{
				?><a href="search_start.php?page=<?php echo $b; ?>"><?php echo $b.""; ?></a> <?php
			}

}		//mysql_close($db);
?>
<div id="footer">
			<div id="button">
				<p>Send us an <span class="bold">e-mail</span>!</p>
			</div>
		</div>

</body>
</html>