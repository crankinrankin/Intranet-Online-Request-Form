<?php
$logfile= '/var/www/html/main/admin/addapass/log.html';
$IP = $_SERVER['REMOTE_ADDR'];
$logdetails=  date("F j, Y, g:i a") . ': ' . '<a href=http://dnsstuff.com/tools/city.ch?ip='.$_SERVER['REMOTE_ADDR'].'>'.$_SERVER['REMOTE_ADDR'].'</a>';
$fp = fopen($logfile, "a"); 
fwrite($fp, $logdetails);
fwrite($fp, "<br>");
fclose($fp); 
?>