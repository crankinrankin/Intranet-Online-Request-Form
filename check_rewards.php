<?php
require('config2.php'); // Requires config.php so we can access the database.	
	
	$query1 = mysql_query("SELECT * FROM ae.authentication WHERE account like '%".$_GET['account']."%' AND rewards_admin = 1");
	
	
	if(mysql_num_rows($query1) > 0) {
		$array = array();
		while($result1 = mysql_fetch_array($query1)){			
			$account = $result1['account'];
			$first_name = $result1['fname'];
			$last_name = $result1['lname'];
			$username = $result1['username'];
			//array_push($array, $first_name, $last_name, $username);
			
			  array_push($array, array(
				"account" => $account,
				"fname" => $first_name,
				"lname" => $last_name,
				"username" => $username
				));
		}
		
		echo json_encode($array);
	}
	

	
			
?>