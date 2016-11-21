<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="myform">
		<form  method="POST" >
<p>Registration for New User:</p>
<form method="post">
<p>Username:
<input type="text" name="username"></p>
<p>Password:
<input type="text" name="password"></p>
<p>First Name:
<input type="text" name="fname"></p>
<p>Surname:
<input type="text" name="sname"></p>
<p>AddressLine1:
<input type="text" name="addressline1"></p>
<p>AddressLine2:
<input type="text" name="addressline2"></p>
<p>City:<br>
<input type="text" name="city"></p>
<p>Mobile:
<input type="number" name="mobile"></p>
<p><input type="submit" value="Add New"/></p>
</form>
</div>
<?php

 require_once "db.php";
 if ( isset($_POST['username']) 
&& isset($_POST['password'])
 && isset($_POST['fname'])
 && isset($_POST['sname'])
 && isset($_POST['addressline1'])
 && isset($_POST['addressline2'])
 && isset($_POST['city'])
 && isset($_POST['mobile']))
 {
$n = $_POST['username'];
$e = $_POST['password'];
$s = $_POST['fname'];
$p = $_POST['sname'];
$z = $_POST['addressline1'];
$f = $_POST['addressline2'];
$q = $_POST['city'];
$r = $_POST['mobile'];
$sql = "INSERT INTO users (username, password,fname,sname,addressline1,addressline2,city,mobile)
VALUES ('$n', '$e','$s','$p','$z','$f','$q','$r')";
echo "<pre>\n$sql\n</pre>\n";
mysql_query($sql);
}
?>
</html>