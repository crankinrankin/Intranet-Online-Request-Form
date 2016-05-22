<?php echo "$accountfield100 $deptnumfield100 $firstnamefield100 $lastnamefield100 $usernamefield100 $passwordfield100 $emailfield100 $locationjoplin100 $locationOKC100 $accountingyesorno100 $laundrylist100 $sendconfirmationemailyesorno100 $sendconfirmationemailto $empemail";?>
<HTML>
<HEAD>
<TITLE>Run Executable</TITLE>
</HEAD>
<!-- <body bgcolor=#565656> --->

<script language="javascript" type="text/javascript">
var oShell = new ActiveXObject("WScript.Shell");
var prog = "C:\\AddaPassAUTOMATED.py";
<!-- oShell.run ('"'+prog+'"',1); --->
oShell.run ('"'+prog+'"'+<?php echo "'$accountfield100'";?>+' '+<?php echo "'$deptnumfield100'";?>+' '+<?php echo "'$firstnamefield100'";?>+' '+<?php echo "'$lastnamefield100'";?>+' '+<?php echo "'$usernamefield100'";?>+' '+<?php echo "'$passwordfield100'";?>+' '+<?php echo "'$emailfield100'";?>+' '+<?php echo "'$locationjoplin100'";?>+' '+<?php echo "'$locationOKC100'";?>+' '+<?php echo "'$accountingyesorno100'";?>+' '+<?php echo "'$laundrylist100'";?>+' '+<?php echo "'$sendconfirmationemailyesorno100'";?>+' '+<?php echo "'$sendconfirmationemailto'";?>+' '+<?php echo "'$empemail'";?>,1);
window.open('close.html', '_self');
</script>

</BODY>
</HTML>


