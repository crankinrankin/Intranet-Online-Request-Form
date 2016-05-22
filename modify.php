<?php
//include("check_modifylogin_textareabox.php");
include("required_for_modify.html");
//$logfile2= '/var/www/html/main/admin/addapass/log_modify_accounts.html';
//$IP2 = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//$logdetails2=  date("F j, Y, g:i a") . ': ' . '<a href=http://dnsstuff.com/tools/city.ch?ip='.getenv('HOSTNAME').'>'.gethostbyname($_SERVER['REMOTE_ADDR']).'</a>';
//$fp2 = fopen($logfile2, "a"); 
//fwrite($fp2, $logdetails2);
//fwrite($fp2, "<br>");
//fclose($fp2); 

echo "
<form name = 'requestform' method='post' action='index.php' onsubmit='return(formCheck2(this))'>
<br></br><br></br>
<center>Fields in  <font color='ff0000'> RED</font> are required Fields.&nbsp;&nbsp;</center></p>
<p></p>
<p></p>
<p></p><br></br>"
?>
<? echo "<input type='hidden' value='$empname' name='empname'>"; ?>
<style type="text/css">
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
<!--  <p><font color="ff0000"> Shopping Cart</font> : 
<input type="radio" id="shoppingcart2" tabindex="1" value="Dealerstation"  title="If you've just loaded this page, use your Space Bar instead of mouse to save time" id="dealerstation" name="shoppingcart" {Check}>Old(Dealerstation)&nbsp;
&nbsp;<input type="radio" value="ECI" tabindex="2" name="shoppingcart" title="If you've just loaded this page, use your Space Bar instead of mouse to save time" id="eci" {Check}>New(EcInteractive)&nbsp;</p>
--->
<p><font color="ff0000">Username </font>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input tabindex="3" onKeyUp="autosuggest3();" maxlength="50" id="TextBox1_Name" name="TextBox1_Name" style="WIDTH: 80px; HEIGHT: 22px" autocomplete="off"><a href="#" class="hintanchor" onMouseover="showhint('This is the username for the person you need to have I.T. change. This is not a first or last name', this, event, '185px')">[?]</a>&nbsp;&nbsp 
<div id="results"></div>
<!--- The code 1 line below, just places the cursor in the account box on page load -->
<script>document.getElementById('TextBox1_Name').focus()</script>
<P><font color="ff0000">Modification Notes</font>:<BR> 
<TEXTAREA NAME="comment" id="comment" ROWS="15" COLS="50" wrap="HARD" tabindex="4">
</TEXTAREA></br>

<? echo "<input type='hidden' value='2' name='whereami'>"; ?>
<? echo "<input type='hidden' value='$email' name='empemail'>"; ?>
<br>
<br>
<br>
<br>
<input type="submit" tabindex="5" value="Submit Request" name="Submit"></p>
</html>
</body>
</form>
  </body>
  </html>