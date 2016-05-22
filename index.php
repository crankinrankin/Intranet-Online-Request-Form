<?php 
include("db.php");

if($_POST['login-rememberme']=='on'){
		//$id2 = base64_encode($empid);
		$id2 = $_POST['empid'];
		setcookie("addapass_rmme", "id2=$id2", time()+5184000); // 60 days before cookie expires
//}else{
	//$id2 = '';
	//setcookie("addapass_rmme", "", time()-3600);
//}
}

if(isSet($_COOKIE['addapass_rmme'])){
	parse_str($_COOKIE['addapass_rmme']);
	if(isset($id2)){
		//$id2 = base64_decode($id2);
		$id2 = $id2;
		$rememberme_check = 'checked';
		}else{
		$id2 = '';
		$rememberme_check = '';
	}
	
}else{
	$rememberme_check = '';
}

?>
<script type="text/javascript" src="lib/ajax_framework.js"></script>
<html>
<head>
	<title>New Online Account Request Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="true" />
	
	<meta name="keywords" content="" />
	
	<style type="text/css" media="all">@import "images/style.css";</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss/" />
</head>

<body>
	<div class="content">
		<div id="header">
			<div class="f_search">
					<form method="post" name="post1" id='post1' action="?">
					
			</div>
			<div class="title">
				<center><h1></h1>
				<h2><br></br></h2></center>
			</div>
		</div>
	    <div id="subheader">
			<div class="padding">
				<center><h2>Select Your Name to Begin</h2>
				 <form name = 'email' id='email' action='test1.php' method='post'>
				 <input id="login-rememberme" type="checkbox" <?php echo $rememberme_check;?> name="login-rememberme" onClick="javascript:if(document.getElementById('login-rememberme').checked==false){document.cookie = 'addapass_rmme' +'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';}"/>
				 <label for="login-rememberme">Remember me</label></center>
				 
<? if($failed==1){
echo "<font color='ff0000'>You must choose from a name below</font>";
}
?>
<!-- <script src="selectuser.js"></script>-->
<!--- <center><SELECT NAME='empid' onchange="showUser(this.value)"></center> --->
<center><SELECT NAME='empid' id='empid'></center>
<?php
if(isSet($_COOKIE['addapass_rmme'])){
	parse_str($_COOKIE['addapass_rmme']);

	if(isset($id2)){
		
		$id2 = $id2;
		$rememberme_check = 'checked';
	}
}

echo "<OPTION VALUE='none'>Please Choose...";
$query = "SELECT * FROM salesman order by first_name";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
	$id=$row['id'];
	if($id<>1){
	$first=$row['first_name'];
	$last=$row['last_name'];
	$email=$row['email'];
if($id2 == $id){
		echo "<OPTION selected VALUE='$id'>$first $last";
	}else{
		echo "<OPTION VALUE='$id'>$first $last";
	}
}
}

	
?>
</select>
</option>

<br/>
<span style="line-height:2.4em;"> 
<input type = 'submit' value='New Login' name = 'submit'>
<input type = 'submit' value='Modify a Login' name='submit'></span></center>
			</div>
		</div>
	
		<div id="main">
			<div class="right_side">
				<h2></h2>
				<h3><?php include("test1.php");?>
				</h3>
				
				<h2><?php if($whereami==1){
				include("processemailadmin.php");
				}if($whereami==2){
				include("processemailadmin2.php");
				}
				?></h2>
				<h3></h3>
				
			</div>
			<div class="left_side">
				<div class="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="password.php">Admin</a></li>
				   	</ul>
				</div>
				<br />
				<div class="hitems">
					<h2></h2>
					<ul>
					<!--	<li><a href="#">Article top 1</a></li>
						<li><a href="#">Article top 2</a></li>
						<li><a href="#">Article top 3</a></li>
						<li><a href="#">Article top 4</a></li> -->
					</ul>
					<br />
					<h2></h2>
					<ul>
					<!--	 -->
					</ul>
				</div>
			</div>
		</div>
		
		<div id="footer">
			<div class="padding">
				Admiral Express <a href="https://192.168.1.100/">
			</div>
		</div>
	</div>
</body>
</form>
</html>
