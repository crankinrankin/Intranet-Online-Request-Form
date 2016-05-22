<?php 
include("db.php");
?>

<html>
<body bgcolor=#c4c4c4 onload=SetFoci(document)>
<center>
<td><img src="logo2.gif" border="0"></td>
</center>
<center>
  <!-- <h1>Online Access Request Form</h1> -->
  <p></p>
  
       <html><body bgcolor='#c4c4c4'><center><br>Select your Name to Begin<br>
	<br><form name = 'email' action='test1.php' method='post'>
<?if($failed==1){
echo "<h2><font color='ff0000'>You must choose from a name below</font></h2>";
}
?>
	Name: <SELECT NAME='empid'>

<?php
echo "<OPTION VALUE=''>Select Below...";
$query = "SELECT * FROM salesman";
$result = mysql_query($query) or die(mysql_error());
while  ($row=mysql_fetch_array($result)) {
	$id=$row['id'];
	if($id<>1){
	$first=$row['first_name'];
	$last=$row['last_name'];
	$email=$row['email'];
echo "<OPTION VALUE='$id'>$first $last";
	}
	}
	
?>

	</SELECT><br><br>
	<input type = 'submit' value='Enter' name='sumbit'>
	</form>
  </body>
  </html>
