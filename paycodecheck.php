<?php
$link1 = mysql_connect('your mysql db ip here', 'your mysql db user', 'your mysql db pass');
mysql_select_db('ae');

$account = $_GET['account'];
$stack = array ();

        
$check = "SELECT c_name,c_number,c_dept, c_prepay from ae.cmaster where ltrim(c_number) = '$account'";
$res1 = mysql_query($check, $link1) or die(mysql_error());
mysql_close($link1);
while ($row = mysql_fetch_array($res1)) {
$prepay = $row["c_prepay"];
array_push ($stack,$prepay);
}
if (in_array("Y", $stack)) {
    $prepayY = true;
	$to = "clint@admiralexpress.com";
	$subject = "Pre Pay was triggered!";
	$message = "Someone Triggered a Prepay alert when filling out the online access form. Account: $account";
	$from = "clint@admiralexpress.com";
	$headers = "From: $from";
	mail($to,$subject,$message,$headers);
}else{
    $prepayY = false;
}



if($prepayY == 'Y'){
?> 
This is a prepay
<?
}
?>
