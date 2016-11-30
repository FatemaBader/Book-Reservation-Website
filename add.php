<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>

	<div id="myform" >
		<form method="POST" action="add.php" onsubmit="return myFunction()" >
			<p>Registration for New User:</p>
			<form method="post">
			<p>Username:
			<input type="text" name="username" required></p>
			<!--<p>Password:
			<input type="text" name="pass1" maxlength="6" 
			pattern=".{6,}"   required title="Minimum 6 characters"></p>
			<p>Confirm Password:
			<input type="password" placeholder="pass2" id="confirm_password" required></p>-->
<input id="password" name="password" type="password" placeholder="Password"  maxlength="6" 
			pattern=".{6,}"   required title="Minimum 6 characters" /> <br />
<input id="pass2" type="password" placeholder="Confirm Password" required/> <br />

<script>
    function myFunction() {
        var password = document.getElementById("password").value;
        var pass2 = document.getElementById("pass2").value;
		var ok = true;
        if (password != pass2) {
            alert("Passwords dont Match!!!");
			ok=false;
        }
		return ok;
    }
</script>
			<p>First Name:
			<input type="text" name="fname" required></p>
			<p>Surname:
			<input type="text" name="sname" required></p>
			<p>AddressLine1:
			<input type="text" name="addressline1" required></p>
			<p>AddressLine2:
			<input type="text" name="addressline2" required></p>
			<p>City:<br>
			<input type="text" name="city" required></p>
			<p>Telephone:
			<input type="number" name="Telephone" required></p>
			<p>Mobile:
			<input type="number" name="mobile" required></p>
			<p><input type="submit" value="Submit"/></p>
		</form>
	</div>
		<div id="footer">
			<div id="button">
				<p>Send us an <span class="bold">e-mail</span>!</p>
			</div>
		</div>
</body>
</html>
<?php
 require_once "db.php";
 if ( isset($_POST['username']) 
&& isset($_POST['password'])
 && isset($_POST['fname'])
 && isset($_POST['sname'])
 && isset($_POST['addressline1'])
 && isset($_POST['addressline2'])
 && isset($_POST['city'])
 && isset($_POST['Telephone'])
 && isset($_POST['mobile']))
 {
$n = $_POST['username'];
$e = $_POST['password'];
$s = $_POST['fname'];
$p = $_POST['sname'];
$z = $_POST['addressline1'];
$f = $_POST['addressline2'];
$q = $_POST['city'];
$t = $_POST['Telephone'];
$r = $_POST['mobile'];

 //check that it is no more than 10 characters
 if (strlen($r) > 10)
 {
	echo('<p align="centre" style="color:red">Error:'."Mobile phone 
	numbers should be numeric and 10 characters in length.\n"."</p>\n");
	exit;
}
if (strlen($r) < 10)
{
	echo('<p align="centre" style="color:red">Error:'."Mobile phone 
	numbers should be numeric and 10 characters in length.\n"."</p>\n");
	exit;
}
//check if it's a numeric
 
 if (!is_numeric($r)) 
 {
        echo "'{$r}' is NOT numeric";
		exit;
 }

$sql = "INSERT INTO users (username, password,fname,sname,addressline1,addressline2,city,Telephone,mobile)
VALUES ('$n', '$e','$s','$p','$z','$f','$q','$t','$r')";

//print to screen to confirm that they have been added to sql database
//echo "<pre>\n$sql\n</pre>\n";

echo 'Success - Please Log in <a href="loginhtml.php">Continue...</a>';
mysql_query($sql);
}
?>
