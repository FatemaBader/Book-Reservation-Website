<?php session_start();
require_once "db.php";
$username = $_SESSION['username'];
echo $username;
		
		$id = $_GET['id'];
		echo $id;
		//update reserved field on books table to Y 
		//Insert ISBN username and time into reserved table
		
		//$sql="UPDATE books ". "SET reserved = 'Y' ". 
               //"WHERE (`ISBN` LIKE '%".$id."%')" ;
			   
		//$sql = "UPDATE books SET reserved='Y' WHERE (`ISBN` LIKE '%".$category."%')";
		// $result = mysql_query("SELECT ISBN,title FROM books
            // WHERE (('ISBN' LIKE '%".$id."%')") or die(mysql_error());

		// $row=mysql_fetch_array($result);
		// echo "<p>Confirm: Reserve $row[0] with ID: $row[1]</p>\n";
		// echo('<form method="post"><input type="hidden" ');
		// echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
		// echo('<input type="submit" value="Reserve" name="Reserve">');
		// echo('<a href="menu.php">Cancel</a>');
		// echo("\n</form>\n");

			$today=date("Y-m-d");
			echo $today;
			//$id = mysql_real_escape_string($_POST['id']);
			$update="Update books Set reserved='Y' WHERE ISBN='$id'"; 
			// mysqli_query($con,$update);
			// $insert = "INSERT INTO RESERVATIONS(ISBN,USERNAME,BOOKINGDATE) VALUES ('$id','$username','$today')";
			// mysqli_query($con,$insert);
			// echo 'Success - <a href="menu.php">Continue...</a>';
			// return;
		// }



 ?>