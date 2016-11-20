
<?php
$db = @mysql_connect('localhost', 'root', '')or die('Fail message');
mysql_select_db("book")or die("Fail message");
?> 