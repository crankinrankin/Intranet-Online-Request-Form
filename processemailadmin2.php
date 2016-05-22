<?php
//include('accesscontrol.php');
include('db.php');
include('common.php');
//echo $empid;
//echo $name;
$query = "SELECT * FROM salesman where id = '$empid'";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
		$email=$row['email'];
		$empname=$row['first_name'];
echo "$email";
echo "$empname";
}
//Send Email start
    ini_set("SMTP", "192.168.1.63");		
?>


   
<?php
// This section sends an email to the account administrator. 

$query = "SELECT account FROM ae.authentication where username = '$TextBox1_Name';";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
		$account=$row['account'];
}

$website="Shopping Cart: ";
$accountfield0="<br><b>Account:</b> $account";
$accountfield="<br><b>Username:</b> ";
$departmentfield="<br>Department: ";
$locationfield="<br>Location: ";
$firstnamefield="<br>First Name: ";
$lastnamefield="<br>Last Name: ";
$usernamefield="<br>UserName: ";
$passwordfield="<br>PassWord: ";
$emailfield="<br>Email :";
$laundrylistfield="<br>Laundry List: ";
$accountingaccessfield="<br>Accounting Access?: ";
$confirmationemail="<br>Did $empname ask for a confirmation Email?: ";
$alsosendemail1="<br>$empname said to send a confirmation email to: ";
$alsosendemail2="<br>$empname also said to send a confiramtion email to: ";
$additionalcomments="<br>$empname's additional comments were: ";

if ($shoppingcart=="Dealerstation") {
	$platform=0;
	}
if ($shoppingcart=="ECI") {
	$platform=1;
	}
if($TextBox1_Name=="") {
	$accountfield="";
	}
if($TextBox2_Name=="") {
	$departmentfield="";
	}
if($RadioButton1_Name=="") {
	$locationfield="";
	}
if($firstname=="") {
	$firstnamefield="";
	}
if($lastname=="") {
	$lastnamefield="";
	}
if($username=="") {
	$usernamefield="";
	}
if($password =="") {
	$passwordfield="";
	}
if($user_email=="") {
	$emailfield="";
	}
if( $laundry_list=="") {
	$laundrylistfield="";
	}
if( $accounting=="") {
	$accountingaccessfield="";
	}
if($order_email=="") {
	$confirmationemail="";
	}
if($also_email1=="") {
	$alsosendemail1="";
	}
if($also_email2=="") {
	$alsosendemail2="";
	}
if($comment=="") {
	$additionalcomments="";
	}
if ($RadioButton1_Name=="Tulsa") {
	$tulsa100=1;
	}else{
	$tulsa100=0;
	}
if ($RadioButton1_Name=="Joplin") {
	$joplin100=1;
	}else{
	$joplin100=0;
	}
if ($RadioButton1_Name=="OKC") {
	$OKC100=1;
	}else{
	$OKC100=0;
	}
if ($RadioButton1_Name=="Springdale") {
	$springdale100=1;
	}else{
	$springdale100=0;
	}
if ($accounting=="Yes") {
	$accounting100=1;
	}else{
	$accounting100=0;
	}
if ($TextBox2_Name=="") {
	$department100="none";
	}else{
	$department100=$TextBox2_Name;
	}
if ($user_email=="") {
	$useremail100="none";
	}else{
	$useremail100=$user_email;
	}
if ($laundry_list=="") {
	$laundrylist100="none";
	}else{
	$laundrylist100=$laundry_list;
	}
if ($order_email=="No") {
	$confirmationemail100=0;
	}else{
	$confirmationemail100=1;
	}
if ($confirmationemail100==1) {
	$sendconfirmationtosalesman=$empemail;
	if ($also_email1 <> ''){
		$sendconfirmationtosalesman.=';'.$also_email1;
		}
	if ($also_email2 <> ''){
		$sendconfirmationtosalesman.=';'.$also_email2;
		}
}else{
	$sendconfirmationtosalesman="none";
}

$toplogo="
<html>
<head>
	<title>Online Account Request</title>
	<meta http-equiv='content-type' content='text/html; charset=utf-8'>
	<meta http-equiv='content-language' content='en-us'>
</head>

<body bgcolor='#f1f1f1' font-size='10px' leftmargin='0' topmargin='0' rightmargin='0' bottommargin='0' marginwidth='0' marginheight='0'>

<!-- CSS goes in <body> in case contents of <head> is stripped -->

<style type='text/css'>
body,td { color: #000000; font-size: 11px; line-height: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; }
p { font-size: 12px; margin-top : 5px; margin-bottom : 10px; line-height: 15px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #333; }
a { text-decoration: underline; color: #8c2323; }
a:hover { text-decoration: none; }
.announcementTitle { color: #af4141; font-size: 18px; font-weight: bold; padding-bottom:5px; margin-bottom: 20px; border-bottom: 1px solid #d9d9d9; }
.footerText, .footerText a { color: #fff; }
.topNote { font-size: 10px; color: #656565; padding: 10px 0 8px 0; }
.topNote a { color: #3d3d3d; }
</style>

<!-- The entire email is wrapped in a table to make sure the background color is displayed if it's stripped from the body tag -->

<table width='100%' bgcolor='#f1f1f1' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top' align='center'>

	<!-- Link to web-based version of this email -->

	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0'>
	<tr>
		
	</tr>
	</table>
	
	<!-- Header table -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#8c2323'>
	<tr>
		<td><img src='http://192.168.1.195/admin/addapass/logo15.gif' alt='Online Request' width='600' height='110'></td>
	</tr>
	</table>
	
	<!-- Content table -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff'>
	<tr>
		<td width='25'><img src='http://192.168.1.195/admin/addapass/_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
		<td width='550' valign='top'>
		
		<br><br>

			
		<!-- Email Content -->
		
		<p class='announcementTitle'>Please Check/Modify this Account</p>
		
		<p><strong><!--- text here ------></strong></p>
<p><font color='99000'>$accountfield0</font><font color='99000'>$accountfield</font> $TextBox1_Name <font color='99000'>$additionalcomments</font> $comment </p>






</form>


	
		<br><br>
		
		</td>
		<td width='25'><img src='_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
	</tr>
	</table>
	
	<!-- Unsubscribe -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='00' border='0' bgcolor='#333333'>
	<tr>
		<td width='25'><img src='_space.gif' width='25' height='1' border='0' alt='spacer image'></td>	
		<td width='225'><span class='footerText'>This email was supposed to be sent to <br>[$email2]</br><strong><td width='225' align='right'><img src='/_space.gif' width='1' height='15' border='0' alt='spacer image'><br><span class='footerText'><strong><a href='#'>Admiral Express</a></strong><br>I.T. Department<br></span><br><img src='/_space.gif' width='1' height='15' border='0' alt='spacer image'><br></td>
		<td width='25'><img src='_space.gif' width='25' height='1' border='0' alt='spacer image'></td>	
	</tr>
	</table>
	
	<br><br>

	</td>
</tr>
</table>

</body>
</html>
";	




// This section sends an email to the account administrator. Clint Rankin right now.
$to = "$email2";
$subject = "Online Account Modification for $TextBox1_Name";
    $message = "$toplogo";
    $from = "$empemail";
    $additional_headers = "From: $from\nReply-To: $from\nContent-Type: text/html";
    mail ($to, $subject, $message, $additional_headers);
    ini_restore("SMTP");
//End Send Email stop
	//echo "<form action = 'accesscontrol.php' method='post'>
	//<input type = 'submit' value ='Return'>
	echo "<center>Your Request has been emailed to $email2</center>";
?> 


<?php
// This section sends an email to the saleman
##$website="Shopping Cart: ";
##$accountfield="<br>Account: ";
$accountfield="<br>Username: ";
$departmentfield="<br>Department: ";
$locationfield="<br>Location: ";
$firstnamefield="<br>First Name: ";
$lastnamefield="<br>Last Name: ";
$usernamefield="<br>UserName: ";
$passwordfield="<br>PassWord: ";
$emailfield="<br>Email :";
$laundrylistfield="<br>Laundry List: ";
$accountingaccessfield="<br>Accounting Access?: ";
$confirmationemail="<br>Did you ask for a confirmation Email?: ";
$alsosendemail1="<br>I said to send a confirmation email to: ";
$alsosendemail2="<br>I also said to send a confiramtion email to: ";
$additionalcomments="<br>My Modification Notes were: ";

if($TextBox1_Name=="") {
	$accountfield="";
	}
if($TextBox2_Name=="") {
	$departmentfield="";
	}
if($RadioButton1_Name=="") {
	$locationfield="";
	}
if($firstname=="") {
	$firstnamefield="";
	}
if($lastname=="") {
	$lastnamefield="";
	}
if($username=="") {
	$usernamefield="";
	}
if($password =="") {
	$passwordfield="";
	}
if($user_email=="") {
	$emailfield="";
	}
if( $laundry_list=="") {
	$laundrylistfield="";
	}
if( $accounting=="") {
	$accountingaccessfield="";
	}
if($order_email=="") {
	$confirmationemail="";
	}
if($also_email1=="") {
	$alsosendemail1="";
	}
if($also_email2=="") {
	$alsosendemail2="";
	}
if($comment=="") {
	$additionalcomments="";
	}
$toplogo="
<html>
<head>
	<title>Online Account Request</title>
	<meta http-equiv='content-type' content='text/html; charset=utf-8'>
	<meta http-equiv='content-language' content='en-us'>
</head>

<body bgcolor='#f1f1f1' font-size='10px' leftmargin='0' topmargin='0' rightmargin='0' bottommargin='0' marginwidth='0' marginheight='0'>

<!-- CSS goes in <body> in case contents of <head> is stripped -->

<style type='text/css'>
body,td { color: #000000; font-size: 11px; line-height: 14px; font-family: Verdana, Arial, Helvetica, sans-serif; }
p { font-size: 12px; margin-top : 5px; margin-bottom : 10px; line-height: 15px; font-family: Verdana, Arial, Helvetica, sans-serif; color: #333; }
a { text-decoration: underline; color: #8c2323; }
a:hover { text-decoration: none; }
.announcementTitle { color: #af4141; font-size: 18px; font-weight: bold; padding-bottom:5px; margin-bottom: 20px; border-bottom: 1px solid #d9d9d9; }
.footerText, .footerText a { color: #fff; }
.topNote { font-size: 10px; color: #656565; padding: 10px 0 8px 0; }
.topNote a { color: #3d3d3d; }
</style>

<!-- The entire email is wrapped in a table to make sure the background color is displayed if it's stripped from the body tag -->

<table width='100%' bgcolor='#f1f1f1' cellpadding='0' cellspacing='0'>
<tr>
<td valign='top' align='center'>

	<!-- Link to web-based version of this email -->

	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0'>
	<tr>
		
	</tr>
	</table>
	
	<!-- Header table -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#8c2323'>
	<tr>
		<td><img src='http://192.168.1.195/admin/addapass/logo15.gif' alt='Online Request' width='600' height='110'></td>
	</tr>
	</table>
	
	<!-- Content table -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff'>
	<tr>
		<td width='25'><img src='http://192.168.1.195/admin/addapass/_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
		<td width='550' valign='top'>
		
		<br><br>
		
		<!-- Email Content -->
		
		<p class='announcementTitle'>Below Is What You Asked to Check/Modify</p>
		
		<p><strong><!--- text here ------></strong></p>
<p><font color='99000'></font><font color='99000'>$accountfield</font> $TextBox1_Name <font color='99000'>$additionalcomments</font> $comment </p>
		

		<br><br>
		
		</td>
		<td width='25'><img src='_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
	</tr>
	</table>
	
	<!-- Unsubscribe -->
	
	<table align='center' width='600' cellspacing='0' cellpadding='00' border='0' bgcolor='#333333'>
	<tr>
		<td width='25'><img src='_space.gif' width='25' height='1' border='0' alt='spacer image'></td>	
		<td width='225'><span class='footerText'>This email was supposed to be sent to<br>[$empemail]</br><strong><td width='225' align='right'><img src='/_space.gif' width='1' height='15' border='0' alt='spacer image'><br><span class='footerText'><strong><a href='#'>Admiral Express</a></strong><br>I.T. Department<br></span><br><img src='/_space.gif' width='1' height='15' border='0' alt='spacer image'><br></td>
		<td width='25'><img src='_space.gif' width='25' height='1' border='0' alt='spacer image'></td>	
	</tr>
	</table>
	
	<br><br>

	</td>
</tr>
</table>

</body>
</html>
";	





$to = "$empemail";
	$subject = "Receipt of Your Online Modification for $TextBox1_Name";
    $message = "$toplogo";
    $from = "$email2";
    $additional_headers = "From: $from\nReply-To: $from\nContent-Type: text/html";
    mail ($to, $subject, $message, $additional_headers);
    ini_restore("SMTP");
//End Send Email stop
	//echo "<form action = 'accesscontrol.php' method='post'>
	//<input type = 'submit' value ='Return'>
	echo "<center>A Receipt for your records has also been sent to $empemail</center>";
?> 
