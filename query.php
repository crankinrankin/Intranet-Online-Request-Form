<?php
include("db.php");

$query = "SELECT * FROM salesman";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
	$id=$row['id'];
	$first=$row['first_name'];
	$last=$row['last_name'];
	$email=$row['email'];
echo "<OPTION VALUE='$id'>$first $last";
	}
?>