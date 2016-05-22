<?php
if(isset($empid)){
if($empid<>'none'){
//include('accesscontrol.php');
//include('common.php');
//include('query.php');
include("db.php");
include("required.html");
include("show_hint.html");
include("progress_bar.html");
include("numbers_only.html");
include("numbers_only2.html");
include("chk.html");
include("check_firstname_spaces.html");
include("check_lastname_spaces.html");
include("check_username_password_minimum_length.html");
#include("check_password_minimum_length.html");
include("numbers_and_letters_only_username_and_password.html");
//include("check_length_username_and_password.html");
//include("validate_email.html");
include("search.html");
include("checkemail.html"); 
include("prepay_lookup.php"); 
include("GetAccounts.html"); 
include("check_if_duplicate_user.html"); 
include("check_rewards.html"); 
//include("order_entry_check.html"); 

//echo $first_name;
$query = "SELECT * FROM salesman where id = '$empid'";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
		$email=$row['email'];
		$empname=$row['first_name'];
echo "<h4><center>$empname your email address that's on file is $email <br> If this is not correct please notify I.T.</center></h4>";
}
if ($submit=='Modify a Login'){
	include("modify.php");
	}
if ($submit=='New Login'){
	
		
$logfile= '/var/www/html/main/admin/addapass/log.html';
$IP = $_SERVER['REMOTE_ADDR'];
$logdetails=  date("F j, Y, g:i a") . ': ' . '<a href=http://dnsstuff.com/tools/city.ch?ip='.$_SERVER['REMOTE_ADDR'].'>'.$_SERVER['REMOTE_ADDR'].'</a>';
$fp = fopen($logfile, "a"); 
fwrite($fp, $logdetails);
fwrite($fp, "<br>");
fclose($fp);
//echo "testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest123".$IP; 
?>


<head>
<script src="../../../jquery/jquery-1.9.1.js"></script>
<script src="../../../jquery/jAlert-v3.js"></script>
<link rel="stylesheet" href="../../../jquery/jAlert-v3.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet prefetch">
<script type="text/javascript">


function choice(select) {
     rewards_type = select.options[select.selectedIndex].value;
	 if(rewards_type == 'rewards1'){
		alert("THIS MEANS : \r\n This user will collect, see and redeem their 'own' points");
		var text = $('#comment').val();
		if(text == 'PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. '){
			//$("#comment").text("PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ");
			$('#comment').text( $('#comment').text().replace('PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ', '') );
		}
	 } else if (rewards_type == 'rewards2'){
		run_rewards_check2();
		//alert("THIS MEANS : \r\n Don't allow this person to see total rewards for this account but I want their purchases to count towards rewards totals. There's already a program Administrator at this company that can see the companies Rewards Totals.")
	 } else if (rewards_type == 'rewards3'){
		alert("THIS MEANS : \r\n I don't want purchases this person makes to count towards rewards. Furthermore I don't want them to be able to collect, see or manage rewards.")
		var text = $('#comment').val();
		if(text == 'PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. '){
			//$("#comment").text("PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ");
			$('#comment').text( $('#comment').text().replace('PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ', '') );
		}
	 }else{
		alert("You can't leave this field blank. You must selecting something.");
		var text = $('#comment').val();
		if(text == 'PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. '){
			//$("#comment").text("PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ");
			$('#comment').text( $('#comment').text().replace('PLEASE MAKE THIS PERSON THE REWARDS PROGRAM ADMINISTRATOR. ', '') );
		}
	 }
	 
}
</script>

</head>

<style type="text/css">
.mystri {text-decoration: line-through;}
/* ---------------------------- */
/* CUSTOMIZE AUTOSUGGEST STYLE	*/
#search-wrap input{width:200px; font-size:10px; color:#999999; padding:6px; border:solid 1px #999999;}
#results{width:400px; border:solid 1px #DEDEDE; display:none;}
#results ul, #results li{padding:0; margin:0; border:0; list-style:none;}
#results li {border-top:solid 1px #DEDEDE;}
#results li a{display:block; padding:4px; text-decoration:none; color:#000000; font-weight:bold;}
#results li a small{display:inline; text-decoration:none; color:#999999; font-weight:normal;}
#results li a:hover{background:#FFFFCC;}
#results ul {padding:6px;}
</style>
<!-- onsubmit="return validate2();" -->
<body text="#000000" vlink="#000099" onLoad="document.getElementById('notify1N').checked = true; document.getElementById('order_emailN').checked=true; document.getElementById('loc1').disabled = true;document.getElementById('loc2').disabled = true;document.getElementById('loc3').disabled = true;document.getElementById('loc4').disabled = true;document.getElementById('ppN').checked = true; document.getElementById('Account').value=''; document.requestform.location[0].checked=false;document.requestform.location[1].checked=false;document.requestform.location[2].checked=false;document.requestform.location[3].checked=false;document.requestform.location[4].checked=false;" alink="#ff0000" link="#000099" bgcolor="#c4c4c4">
<!--&& search(document.requestform, frametosearch) -->
<br><form name = 'requestform' method='post' action='index.php' onsubmit="return (formCheck(this) && search(document.requestform, frametosearch) && validateEmail(document.requestform.user_email.value,0,1) && validateUsr() && fix_DisabledItems() && run_duplicate_check() && document.forms['requestform'].submit()) ">

<center>Fields in  <font color="ff0000"> RED</font> are required Fields.&nbsp;&nbsp;</center></p>
<input type="hidden" name="findthis" value="Not Available">
<p></p>
<p></p>
<p></p>
<? echo "<input type='hidden' value='$empname' name='empname'>"; ?>
</br>
<p><font color="ff0000"> Shopping Cart</font> : 
&nbsp;<input type="radio" value="ECI" tabindex="1" name="shoppingcart" checked="checked" title="If you've just loaded this page, use your Space Bar instead of mouse to save time" id="eci" {Check}>EcInteractive&nbsp;</p>

<p><font color="ff0000">Account # </font>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="Account" id="Account" onchange="javascript:document.getElementById('loc1').disabled = true;document.getElementById('loc2').disabled = true;document.getElementById('loc3').disabled = true;document.getElementById('loc4').disabled = true;document.getElementById('Dept').options.length = 0;var e1 = document.getElementById('Account'); var account1 = e1.options[e1.selectedIndex].value;getAccounts(account1);getLocation(account1); document.getElementById('Dept').value='Main Account - No Dept'; run_rewards_check();">
		<option value='' class='' style=''> &nbsp; </option>
		<? $query1 = mysql_query("select ltrim(c_number) as account, c_name as company from datastore.cmaster where c_number REGEXP('[0-9]') and c_number not in (1,'EDI810') group by c_number order by c_number");
		//$query1 = mysql_query("select ltrim(c_number) as account, c_name as company,cd_statu6 from datastore.cmaster, datastore.cdisc where cd_key = c_number and c_dept = '' and c_number REGEXP('[0-9]') and c_number not in (1,'EDI810') group by c_number order by c_number");
		while($result1 = mysql_fetch_array($query1)){
			$account_test = $result1['account'];
			// $query2 = mysql_query("select IF( (select count(c_dept) as Total_Depts from datastore.cmaster where ltrim(c_number) = '$account_test') >1,
									// IF(
									// (select count(c_dept) as Total_Depts from datastore.cmaster where ltrim(c_number) = '$account_test') 
									// = 
									// (select count(cd_key) from datastore.cdisc where trim(cd_key) like '$account_test%' and cd_statu6 != '')
									// ,'TRUE','FALSE')
								// ,'FALSE') as no_order;");
			// while($result2 = mysql_fetch_array($query2)){
				// $no_order = $result2['no_order'];
			// }
			// if($no_order  == 'TRUE'){
				// $class = "class='mystri' style='color: red;'";
			// }else{
				// $class = '';
			// }
					$options .= "<option value='".$result1['account']."'>".$result1['account']."</option>";
		}
		echo $options;
		?>
</select>

<p>Default Department # : &nbsp 
<select name=Dept id="Dept" onchange="javascript: var t1= ''; var t2= ''; var prepay=''; var order_entry_exempt = ''; t1 = document.getElementById('Dept').value; t2 = t1.split(','); prepay = t2[1]; if(prepay == 'Y'){document.getElementById('ppY').checked = true}else{document.getElementById('ppN').checked = true}; var order_entry_exempt = t2[2]; if(order_entry_exempt !='' && t1 != ''){alert('This Dept is blocked from ordering. Until the Accounting Dept removes the block you will not be able to select this dept. Once they remove the block it could still take up to 15mins before you can select this Dept. You can tell the Accouting Dept there is a \''+order_entry_exempt+'\' in the \'Order Entry Except\' section.  Just leave this page up so you dont have to retype everything & once the block is removed and up to 15mins have went by you will be able to submit the form. Sorry for the inconvenience.');document.getElementById('Dept').options.length = 0;}" onclick="javascript: var plzwait = document.createElement('OPTION'); plzwait.text = 'Loading.....'; plzwait.value = '';  if(document.getElementById('Dept').selectedIndex == -1){Dept.options.add(plzwait);var e = document.getElementById('Account'); var account = e.options[e.selectedIndex].value;getDepts(account);}; ">

</select>

<br />

<p><font color="ff0000"> Prepay</font> : 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <input type="radio" tabindex="3" id="ppY" value="yes"  DISABLED name="prepay" {Check}>Yes &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="no" tabindex="4" id="ppN" name="prepay" {Check} DISABLED CHECKED>No&nbsp;
<br />
<p><font color="ff0000"> Location</font> : 
&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp <input type="radio" tabindex="5" value="Tulsa"  id='loc1'  DISABLED name="location" {Check}>Tulsa&nbsp;
&nbsp;<input type="radio" value="Joplin" tabindex="6" id='loc2'  DISABLED name="location" {Check}>Joplin&nbsp;
&nbsp;<input type="radio" value="OKC" tabindex="7" id='loc3'  DISABLED name="location" {Check}>OKC&nbsp;
&nbsp;<input type="radio" value="Springdale" tabindex="8" id='loc4' DISABLED  name="location" {Check}>Springdale&nbsp;
&nbsp;<input type="radio" value="Springfield" tabindex="9" id='loc5' DISABLED  name="location" {Check}>Springfield&nbsp;</p>


<? echo "<input type='hidden' value='$email' name='email'>"; ?>
<p><font color="ff0000">First Name </font>:&nbsp;&nbsp;&nbsp;<input tabindex="9" maxlength="20" name="firstname" id="firstname" onKeyPress="return numbersandlettersonly(this, event)" autocomplete="off"><a href="#" class="hintanchor" onMouseover="showhint('<b>This field can not contain any spaces.</b> If you need to enter a name that requires a space like John III</br><b>Please do it this way</b></br>JohnIII or John3rd or whichever way you would like. Just make sure there are no spaces or special characters like !@#$%^&*()~`}{][|\.', this, event, '255px')">[?]</a><br /></td>

<p><font color="ff0000">Last Name  </font>:&nbsp;&nbsp;&nbsp;<input tabindex="10" maxlength="20" name="lastname" id="lastname" onKeyPress="return numbersandlettersonly(this, event)" autocomplete="off"><a href="#" class="hintanchor" onMouseover="showhint('<b>This field can not contain any spaces.</b> If you need to enter a name that requires a space like Smith & Smiths</br><b>Please do it this way</b></br>SmithsSmiths or whichever way you would like. Just make sure there are no spaces.', this, event, '255px')">[?]</a><br /></td>

</head>



<br><p><td width="85"><font color="ff0000">Username </font>:  &nbsp;&nbsp;<input type="text" input tabindex="11" name="username" autocomplete="off" id="username1" onKeyPress="return numbersandlettersonly(this, event)" maxlength="45" onKeyup="CheckUsername(this.value);" /><a href="#" class="hintanchor" onMouseover="showhint('<b>This field can not contain any spaces or special characters like !@#$%-)(*&,.</b> Must be between 2 to 25 characters long.</br><b>UserNames are not case sensitive</b></br>This means that johndoe & johnDoe or patty & Patty will not make a difference. The customer can log in with either one.', this, event, '255px')">[?]</a><br /></td>
<td> <div id="usernameresult"></div></td>
</tr>
</table>


<p>Password :&nbsp;&nbsp;&nbsp;&nbsp;<input tabindex="999" maxlength="25" name="password" placeholder="supplies" value="supplies" onFocus="alert('When customer logs in they will be prompted to change their password, which \'supplies\' is a temporary password anyway, not a permanent password. If you want them to have a specific password, you will need to log in as them and change their temporary password.')" onKeyPress="return numbersandlettersonly(this, event)" autocomplete="off"><a href="#" class="hintanchor" onMouseover="showhint('<b>This field can not contain any spaces or special characters like !@#$%-)(*&,.</b><br> Must be between 6 to 25 characters long.</br><b>PassWords are case sensitive.', this, event, '255px')">[?]</a><br />
<script>
/*displaylimit("document.requestform.password","",13) */
</script>
<p><font color="ff0000">Email </font> : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input tabindex="13" maxlength="75" name="user_email" onBlur="" autocomplete="off"><a href="#" class="hintanchor" onMouseover="showhint('<b>This field is for the customers email address.</b><br>Please do not put your personal email here</br>', this, event, '305px')">[?]</a><br />
<P>Contract or Laundry List:&nbsp;<SELECT NAME='laundry_list' tabindex="14">
<?php
$query5 = "SELECT * FROM laundry_lists";
$result5 = mysql_query($query5) or die(mysql_error());
while  ($row5=mysql_fetch_array($result5)) {
	$id5=$row5['id'];
	$laundrycode=$row5['laundry'];

	echo "<OPTION VALUE='$laundrycode'>$laundrycode";
	}
?>
</option></SELECT>
<a href="#" class="hintanchor" onMouseover="showhint('<b>Custom Catalog</b>-When you select a Laundry List the Custom Catalog field will show up for the customer <br><b>Don\'t see a particular Laundry List?<br></b> Send an Email to clint@admiralexpress.com & it will be added. In the mean time you could put your laundry list in the additional notes field below.', this, event, '265px')">[?]</a><br />
<P><font color="ff0000">Rewards </font>:&nbsp;<SELECT name='rewards_list' id="rewards_list" onchange="choice(this)" tabindex="15">
					<OPTION VALUE='' selected="selected" > </option>  
					<OPTION VALUE='rewards1' >Option 1 *DEFAULT) Rewards On - Individual  </option>  
					<OPTION VALUE='rewards2' >Option 2) Rewards On - Account </option> 
					<OPTION VALUE='rewards3' >Option 3) Rewards Off </option> 
				</SELECT>
<a href="#" class="hintanchor" onMouseover="showhint('<b>OPTION 1)</b>: This is the <b>default</b> and almost all users you will want to assign this setting. It means this person will collect, see and redeem their own points. <br><b>Option2):</b> Do not allow this person to see total rewards for this account but I want their purchases to count towards rewards totals. There is already a program Administrator at this company that can see the companies Rewards Totals.<br><b>Option3):</b> I do not want purchases this person makes to count towards rewards. Furthermore I do not want them to be able to collect, see or manage rewards.', this, event, '265px')">[?]</a><br />	
<P> Accounting Access:
<INPUT TYPE=RADIO NAME="accounting" tabindex="16" VALUE="Yes"        >Yes
<INPUT TYPE=RADIO NAME="accounting" tabindex="17" VALUE="No" CHECKED >No<BR>

<div id="notify0">
<P> Notify <u>me</u> by email when this user orders online:
<INPUT TYPE=RADIO NAME="order_email" id="order_emailY" tabindex="18" onclick="document.getElementById('notification2').style.display='block'; document.getElementById('Main_Notify').style.display='none';" VALUE="Yes"        >Yes
<INPUT TYPE=RADIO NAME="order_email" id="order_emailN" tabindex="19" onclick="document.getElementById('notification2').style.display='none'; document.getElementById('Main_Notify').style.display='block'; document.getElementById('also_email1')[0].selected = '1';document.getElementById('also_email2')[0].selected = '1'; document.getElementById('notify_email1')[0].selected = '1'; document.getElementById('notify1N').checked = true;" VALUE="No" CHECKED >No<BR>

<div name="notification2" id="notification2" style="display:none";>
<P>Also notify <SELECT NAME='also_email1' id='also_email1' tabindex="20">
<?php
echo "<OPTION VALUE=''>";
$query3 = "SELECT * FROM salesman where id <> '$empid' order by first_name";
$result3 = mysql_query($query3) or die(mysql_error());
while  ($row3=mysql_fetch_array($result3)) {
	$id3=$row3['id'];
	$first3=$row3['first_name'];
	$last3=$row3['last_name'];
	$email3=$row3['email'];
echo "<OPTION VALUE='$email3'>$first3 $last3";
	}
?>
</option></SELECT> by Email when this user orders online. 

<P>Also notify <SELECT NAME='also_email2' id='also_email2' tabindex="21">
<?php

echo "<OPTION VALUE=''>";
$query4 = "SELECT * FROM salesman where id <> '$empid'";
$result4 = mysql_query($query4) or die(mysql_error());
while  ($row4=mysql_fetch_array($result4)) {
	$id4=$row4['id'];
	$first4=$row4['first_name'];
	$last4=$row4['last_name'];
	$email4=$row4['email'];
echo "<OPTION VALUE='$email4'>$first4 $last4";
	}
?>
</option></SELECT> by Email when this user orders online.
</div>
</div>

<div id='Main_Notify'>
<P> Notify <u>someone else</u> when this user orders online:
<INPUT TYPE=RADIO NAME="notify1" id="notify1Y" tabindex="22" onclick="document.getElementById('notification3').style.display='block'; document.getElementById('notify0').style.display='none';" VALUE="Yes"        >Yes
<INPUT TYPE=RADIO NAME="notify1" id="notify1N" tabindex="23" onclick="document.getElementById('notification3').style.display='none'; document.getElementById('notify0').style.display='block'; document.getElementById('notify_email1')[0].selected = '1';" VALUE="No" CHECKED >No<BR>



<div name="notification3" id="notification3" style="display:none";>
<P>Notify <SELECT NAME='notify_email1' id='notify_email1' tabindex="24">
<?php
echo "<OPTION VALUE=''>";
$query3 = "SELECT * FROM salesman where id <> '$empid' order by first_name";
$result3 = mysql_query($query3) or die(mysql_error());
while  ($row3=mysql_fetch_array($result3)) {
	$id3=$row3['id'];
	$first3=$row3['first_name'];
	$last3=$row3['last_name'];
	$email3=$row3['email'];
echo "<OPTION VALUE='$email3'>$first3 $last3";
	}
?>
</option></SELECT> by Email when this user orders online. 
</div>
</div>

<P>Additional Notes:<BR> 
<TEXTAREA NAME="comment" ID="comment" tabindex="25" ROWS=6 COLS=40>
</TEXTAREA></br>

<? echo "<input type='hidden' value='' name='OrderEntry_Check'>"; ?>

<? echo "<input type='hidden' value='1' name='whereami'>"; ?>
<? echo "<input type='hidden' value='$email' name='empemail' id='empemail'>"; ?>
<br>
<br>
<br>
<br>
<input dataformatas="text" type="button" tabindex="26" onclick="javascript: document.getElementById('rewards_list').disabled=false; var account_submit = document.getElementById('Account').value; var dept_submit = document.getElementById('Dept').value; var dept_submit2 = dept_submit.split(','); var dept_submit = dept_submit2[0]; order_entry_check(account_submit,dept_submit); " value="Submit Request" name="Submit"></p> 
</form>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
<p>&nbsp;
</body>
</html>
</body>
</form>
  </body>
  </html>
<?php }}}?>
