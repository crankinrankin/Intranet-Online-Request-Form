<?php // db.php
$dbconnect = mysql_connect("your mysql db ip here","your mysql db username here","your mysql db password here") or die(mysql_error());
mysql_select_db("datastore");
?>
