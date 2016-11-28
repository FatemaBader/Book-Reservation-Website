<?php session_start();
require_once "db.php";
$username = $_SESSION['username'];
echo $username;
$con = mysqli_connect('localhost', 'root', '', 'book');
		
		
		//update reserved field on books table to Y 
		//Insert ISBN, username and time into reserved table
		
		$id = $_GET['id'];
		echo $id;
		//$id = mysql_real_escape_string($_GET['id']);
		$result = mysqli_query($con,"SELECT TITLE,ISBN FROM BOOKS WHERE ISBN='$id'");
		$row=mysqli_fetch_array($result);
		echo "<p>Confirm: Reserve $row[0] with ID: $row[1]</p>\n";
		echo('<form method="post"><input type="hidden" ');
		echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
		echo('<input type="submit" value="Reserve" name="Reserve">');
		echo('<a href="search.php">Cancel</a>');
		echo("\n</form>\n");

		if ( isset($_POST['Reserve']) && isset($_POST['id']) ) {
			$today=date("Y-m-d");
			$id = mysql_real_escape_string($_POST['id']);
			$update="Update BOOKS Set RESERVED='Y'WHERE ISBN='$id'"; 
			mysqli_query($con,$update);
			$insert = "INSERT INTO RESERVED(ISBN,USERNAME,RDATE) VALUES ('$id','$username','$today')";
			mysqli_query($con,$insert);
			echo 'Success - <a href="search.php">Continue...</a>';
			return;
		}


 ?>