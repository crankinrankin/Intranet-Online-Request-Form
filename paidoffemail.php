<?php
// DO NOT DELETE THIS EMAIL. IT IS CALLED VIA check_modifylogin_textareabox.php
ini_set("SMTP", "mail.admiralexpress.com"); 
// This section sends an email to the account administrator. Clint Rankin right now.
$to = "clint@admiralexpress.com";
$subject = "Looks like your javascript paid off";
$message = "This email was triggered because $empname wanted to change a username on the ECI site but your custom javascript app prevented them from doing it.";
$from = "$email";
$additional_headers = "From: $from\nReply-To: $from\nContent-Type: text/html";
mail ($to, $subject, $message, $additional_headers);
ini_restore("SMTP");
?>
