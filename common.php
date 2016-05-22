<?php 
include("db.php");

//$admin = 1;
$query = "SELECT * FROM salesman_admin";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
		$id=$row['id'];
		$email_admin=$row['email'];
//echo "$email_admin";
}

$email2 = $email_admin;
?>