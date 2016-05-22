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
$Dept = explode(',', $Dept);
$Dept = trim($Dept[0]);
// This section sends an email to the account administrator.
$website="Shopping Cart: ";
$accountfield="<br><b>Account:</b> ";
$departmentfield="<br><b>Department:</b> ";
$prepayfield="<br><b>Prepay: </b>";
$locationfield="<br><b>Location: </b>";
$firstnamefield="<br><b>First Name: </b>";
$lastnamefield="<br><b>Last Name: </b>";
$usernamefield="<br><b>UserName: </b>";
$passwordfield="<br><b>PassWord: </b>";
$emailfield="<br><b>Email: </b>";
$laundrylistfield="<br><b>Laundry List: </b>";
$rewardsfield="<br><b>Rewards:</b> ";
$accountingaccessfield="<br><b>Accounting Access?: </b>";
$confirmationemail="<br><b>Did $empname ask for a confirmation Email?: </b>";
$alsosendemail1="<br><b>$empname said to send a confirmation email to: </b>";
$alsosendemail2="<br><b>$empname also said to send a confiramtion email to: </b>";
$additionalcomments="<br><b>$empname's additional comments were: </b>";

if ($shoppingcart=="Dealerstation") {
	$platform=0;
	}
if ($shoppingcart=="ECI") {
	$platform=1;
	}
if($Account=="") {
	$accountfield="";
	}
if($prepay=="") {
	$prepayfield="";
	$prepay_text = '';
}else{
	if($prepay=='no'){
		$prepay_text = '';
	}elseif($prepay=='yes'){
		$prepay_text = 'PREPAY!!!';
	}else{
		$prepay_text = '';
	}
}

if($Account=="4445") { //added on 3-22-2014 per phil.
	if($prepay=='yes'){
		$prepay_text = 'PREPAY & L-PO REQ\'D!!';
	}else{
		$prepay_text = 'L-PO REQ\'D';
	}
	
}

if($Dept=="NoDepts") {
	$departmentfield="";
}elseif($Dept==""){
	$departmentfield="";
}
if($location=="") {
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
if ($location=="Tulsa") {
	$tulsa100=1;
	}else{
	$tulsa100=0;
	}
if ($location=="Joplin") {
	$joplin100=1;
	}else{
	$joplin100=0;
	}
if ($location=="OKC") {
	$OKC100=1;
	}else{
	$OKC100=0;
	}
if ($location=="Springdale") {
	$springdale100=1;
	}else{
	$springdale100=0;
	}
if ($location=="Springfield") {
	$springfield100=1;
	}else{
	$springfield100=0;
	}
if ($accounting=="Yes") {
	$accounting100=1;
	}else{
	$accounting100=0;
	}
if ($Dept=="") {
		$department100="none";
		$Dept ="";
	}elseif($Dept=="NoDepts"){
		$department100="none";
		$Dept = "";
	}else{
	$department100=$Dept;
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
	}elseif($order_email="Yes"){
		$confirmationemail100=1;
	}else{
		$confirmationemail100=0;
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
if ($notify1=="Yes") {
		$notify_other_confirmationemail100=1;
	}else{
		$notify_other_confirmationemail100=0;
	}
if ($notify_other_confirmationemail100==1) {
	$confirmationemail100=1;
	$sendconfirmationtosalesman=$notify_email1;
	$order_email = 'No, send to '.$notify_email1.' instead';
}
if($rewards_list=="") {
	$rewardsfield=""; 
}elseif($rewards_list=="rewards1"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> 1Default - Admiral Rewards On";
}elseif($rewards_list=="rewards2"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> <font color='red'>Turn Rewards Off. They are tracked on an account basis.</font> - We do not want user to see available rewards.</u></b>";
}elseif($rewards_list=="rewards3"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> <font color='red'>Turn Rewards Off</font>";
}

$account_sql_url = urlencode($Account);
$fname_sql_url = urlencode($firstname);
$lname_sql_url = urlencode($lastname);
$shopper_username_sql_url = urlencode($username);
$password_sql_url = urlencode($password);
$accountant_sql_url = urlencode($accounting100);
$rewards_admin_sql_url = urlencode('0');
$eci_sql_url = urlencode('1');


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

#watermark {
  /* color: #d0d0d0; */
  color: #af4141;
  font-size: 70pt;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  position: absolute;
  width: 100%;
  height: 100%;
  margin: 10;
  z-index: 100;
  left:100px;
  top: 200px;
}

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
	<div id='watermark'>
			$prepay_text
	</div>
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff'>
	<tr>
		<td width='25'><img src='http://192.168.1.195/admin/addapass/_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
		<td width='550' valign='top'>
		
		<br><br>

			
		<!-- Email Content -->
		<p class='announcementTitle'>Please Set This Account up for Online Ordering</p>
		
		<p><strong><!--- text here ------></strong></p>

<p><font color='99000'>$website </font>$shoppingcart <font color='99000'>$accountfield</font> $Account<b><--</b> <font color='99000'>$prepayfield</font> $prepay <font color='99000'>$departmentfield</font>$Dept 
<font color='99000'>$locationfield</font> $location <font color='99000'>$firstnamefield</font> $firstname<b><--</b> <font color='99000'>$lastnamefield</font> $lastname<b><--</b> <font color='99000'>$usernamefield </font><font style='display: none;'>@</font>$username<b><--</b> <font color='99000'>$passwordfield</font> $password<b><--</b> <font color='99000'>$emailfield</font> <font style='display: none;'>@</font>$user_email <font color='99000'>$laundrylistfield</font> $laundry_list <font color='99000'>$accountingaccessfield</font> $accounting
<font color='99000'>$confirmationemail</font> $order_email <font color='99000'>$alsosendemail1</font> $also_email1 <font color='99000'>$alsosendemail2</font> $also_email2 <font color='99000'>$additionalcomments</font> $comment $rewardsfield</p>



<!--  <form name ='redirect' action='http://192.168.1.195/admin/addapass/open.php?accountfield100=$Account&deptnumfield100=$department100&firstnamefield100=$firstname&lastnamefield100=$lastname&usernamefield100=$username&passwordfield100=$password&emailfield100=$useremail100&locationjoplin100=$joplin100&locationOKC100=$OKC100&accountingyesorno100=$accounting100&laundrylist100=$laundrylist100&sendconfirmationemailyesorno100=$confirmationemail100&sendconfirmationemailto=$sendconfirmationtosalesman&empemail=$empemail&platform=$platform&locationSpringdale100=$springdale100&locationSpringfield100=$springfield100' method='post'>

<input type='submit' value='Add a Pass'>
</form>
--> 
<a href='http://192.168.1.195/admin/addapass/sql_insert_new_user.php?account=$account_sql_url&fname=$fname_sql_url&lname=$lname_sql_url&username=$shopper_username_sql_url&password=$password_sql_url&accountant=$accountant_sql_url&rewards_admin=$rewards_admin_sql_url&eci=$eci_sql_url'>Auto Add User to SQL Database</a>

	
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
$subject = "New Online Account Request";
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
$website="Shopping Cart: ";
$accountfield="<br>Account: ";
$prepayfield="<br>Prepay: ";
$departmentfield="<br>Department: ";
$locationfield="<br>Location: ";
$firstnamefield="<br>First Name: ";
$lastnamefield="<br>Last Name: ";
$usernamefield="<br>UserName: ";
$passwordfield="<br>PassWord: ";
$emailfield="<br>Email :";
$laundrylistfield="<br>Laundry List: ";
$rewardsfield="<br><b>Rewards:</b> ";
$accountingaccessfield="<br>Accounting Access?: ";
$confirmationemail="<br>Did you ask for a confirmation Email?: ";
$alsosendemail1="<br>I said to send a confirmation email to: ";
$alsosendemail2="<br>I also said to send a confirmation email to: ";
$additionalcomments="<br>My additional comments were: ";

if($Account=="") {
	$accountfield="";
	}
if($prepay=="") {
	$prepayfield="";
	}
if($Dept=="") {
	$departmentfield="";
	}
if($location=="") {
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
if($rewards_list=="") {
	$rewardsfield=""; 
}elseif($rewards_list=="rewards1"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> 1Default - Admiral Rewards On";
}elseif($rewards_list=="rewards2"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> <font color='red'>Turn Rewards Off. They are tracked on an account basis.</font> - We do not want user to see available rewards.</u></b>";
}elseif($rewards_list=="rewards3"){
	$rewardsfield="<br><font color='99000'><b>Rewards:</b></font> <font color='red'>Admiral Rewards Off</font>";
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

#watermark {
  /* color: #d0d0d0; */
  color: #af4141;
  font-size: 70pt;
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  position: absolute;
  width: 100%;
  height: 100%;
  margin: 10;
  z-index: 100;
  left:100px;
  top: 200px;
}
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
	<div id='watermark'>
			$prepay_text
	</div>
	<table align='center' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff'>
	<tr>
		<td width='25'><img src='http://192.168.1.195/admin/addapass/_space.gif' width='20' height='1' border='0' alt='spacer image'></td>	
		<td width='550' valign='top'>
		
		<br><br>
		
		<!-- Email Content -->
		
		<p class='announcementTitle'>Below Is What You Asked to be Set-Up</p>
		
		<p><strong><!--- text here ------></strong></p>
<p><font color='99000'>$website </font>$shoppingcart <font color='99000'>$accountfield</font> $Account <font color='99000'>$prepayfield</font> $prepay <font color='99000'>$departmentfield</font>$Dept 
<font color='99000'>$locationfield</font> $location <font color='99000'>$firstnamefield</font> $firstname <font color='99000'>$lastnamefield</font> $lastname <font color='99000'>$usernamefield </font>$username <font color='99000'>$passwordfield</font> $password <font color='99000'>$emailfield</font> $user_email <font color='99000'>$laundrylistfield</font> $laundry_list <font color='99000'>$accountingaccessfield</font> $accounting
<font color='99000'>$confirmationemail</font> $order_email <font color='99000'>$alsosendemail1</font> $also_email1 <font color='99000'>$alsosendemail2</font> $also_email2 <font color='99000'>$additionalcomments</font> $comment $rewardsfield</p>
		

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
	$subject = "Receipt of Your Online Request for $Account";
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
