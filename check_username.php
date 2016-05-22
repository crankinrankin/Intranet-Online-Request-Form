<?php
$dbconnect234 = mysql_connect("your mysql db ip address here","your mysql userame here","your mysql password here") or die(mysql_error());
mysql_select_db("ae");
$query23 = mysql_query("SELECT * FROM authentication WHERE username='$username'"); 
$result23 = mysql_num_rows($query23); 
//$username23=$row23['username'];
if($result23 != 0){ 
include("check_username.html");
} else { 
echo "USERNAME IS OK";
} 
?>


