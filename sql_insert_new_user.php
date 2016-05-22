<?php
// CREATED BY: CLINT RANKIN
// LAST MODIFIED: 5-3-2016

## URL EXAMPLE #1: http://192.168.1.195/admin/addapass/sql_insert_new_user.php?account=10001&fname=fname1&lname=lname1&username=test0103&password=password&accountant=1&rewards_admin=1&eci=1

$account = urldecode($_GET['account']);
$fname = urldecode($_GET['fname']);
$lname = urldecode($_GET['lname']);
$shopper_username = urldecode($_GET['username']);
$password = urldecode($_GET['password']);
$accountant = urldecode($_GET['accountant']);
$rewards_admin = urldecode($_GET['rewards_admin']);
$eci = urldecode($_GET['eci']);


//echo $account.'</br>';
//echo $fname.'</br>';
//echo $lname.'</br>';
//echo $shopper_username.'</br>';
//echo $password.'</br>';
//echo $accountant.'</br>';
//echo $rewards_admin.'</br>';
//echo $eci.'</br>';

if($_POST["username"] != ''){
		// Create connection
		$conn = mysql_connect("192.168.1.240","modae","poiuytrewq") or die(mysql_error());
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysql_error());
		}

		
		$account = $_POST['account'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$shopper_username = $_POST['username'];
		$password = $_POST['password'];
		$accountant = $_POST['accountant'];
		$rewards_admin = $_POST['rewards_admin'];
		$eci = $_POST['eci'];
		$sql = "insert into authentication (account,fname,lname,username,password,accountant,rewards_admin,eci) VALUES ('$account','$fname','$lname','$shopper_username','$password','$accountant','$rewards_admin','$eci');";


		mysql_select_db('ae');
		$retval = mysql_query( $sql, $conn );


		if(! $retval ) {
			  die('Could not enter data: ' . mysql_error());
		   }
		   
		   echo "<h2>All Data Entered Successfully\n</h2>";
				   
		   mysql_close($conn);
}else{

	?>

	<html>
	<body>

		<form action="sql_insert_new_user.php" method="post">
			<h2> Is everything correct?</h2>
			Account: 			<input type="text" name="account" 		value="<?php echo $account;?>"><br>
			First Name: 		<input type="text" name="fname" 		value="<?php echo $fname;?>"><br>
			Last Name: 			<input type="text" name="lname" 		value="<?php echo $lname;?>"><br>
			Username: 			<input type="text" name="username" 		value="<?php echo $shopper_username;?>"><br>
			Password: 			<input type="text" name="password" 		value="<?php echo $password;?>"><br>
			Accounting Access: 	<input type="text" name="accountant"	value="<?php echo $accountant;?>"><br>
			Rewards Admin: 		<input type="text" name="rewards_admin"	value="<?php echo $rewards_admin;?>"><br>
			Eci: 				<input type="text" name="eci"			value="<?php echo $eci;?>"><br>
		<input type="submit" value="Enter into Sql">
		</form>

	</body>
	</html> 


	<?php


}

?>
