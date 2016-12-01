<!DOCTYPE html>

<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
			<div id="header">
				<img src="Libraries.jpg">
			</div>
<!--.Create a PHP page that query the product table
 and return/display all data from the table.-->
	<div id="myform">
		<form method="GET" action="search_start.php">
		Book Title:
		<input type="text" name="query" autocomplete="off"/>
		Author:
		<input type="text" name="query2" autocomplete="off"/>
		<input type="submit" value="Search"/>
		</form>
	</div>
		<div id="myform">
			<form method="GET" action="search_category.php">
				Category Description:
				<?php 
				session_start();
				require_once "db.php";
					$sql=mysql_query("SELECT category,cdesc FROM categories");
				if(mysql_num_rows($sql))
				{
					$select= '<select name="select">';
					while($rs=mysql_fetch_array($sql))
					{
						$select.='<option value="'.$rs['category'].'">'.$rs['cdesc'].'</option>';
					}
				}
				$select.='</select>';
				echo $select;
				?>
				<input type="submit" value="Search"/></br></br>
				
						<input type="button" value="Logout"
						onclick="location.href='logout.php'; return false ">
			</form>
		</div>
	<div id="footer">
			<div id="button">
				<p>Send us an <span class="bold">e-mail</span>!</p>
			</div>
	</div>

</body>
</html>