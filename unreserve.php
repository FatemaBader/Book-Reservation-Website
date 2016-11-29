<?php session_start();
require_once "db.php";
$username = $_SESSION['username'];

$con = mysqli_connect('localhost', 'root', '', 'book');
echo 'Username:' . $username;
	
		//update reserved field on books table to N
		//Delete ISBN, username and time into reserved table
		
		$id = $_GET['id'];
		echo $id;
		//$id = mysql_real_escape_string($_GET['id']);
		$result = mysqli_query($con,"SELECT TITLE,ISBN FROM BOOKS WHERE ISBN='$id'");
		$row=mysqli_fetch_array($result);
		echo "<p>Confirm: Remove reservation for $row[0] with ID: $row[1]</p>\n";
		echo('<form method="post"><input type="hidden" ');
		echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
		echo('<input type="submit" value="Remove" name="Remove">');
		echo('<a href="options.html">Cancel</a>');
		echo("\n</form>\n");

		if ( isset($_POST['Remove']) && isset($_POST['id']) ) {
			//$today=date("Y-m-d");
			$id = mysql_real_escape_string($_POST['id']);
			$update="Update BOOKS Set RESERVED='N'WHERE ISBN='$id'"; 
			mysqli_query($con,$update);
			$delete = "DELETE FROM RESERVED WHERE ISBN='$id' ";
			mysqli_query($con,$delete);
			echo 'Success - <a href="options.html">Continue...</a>';
			return;
		}

?>