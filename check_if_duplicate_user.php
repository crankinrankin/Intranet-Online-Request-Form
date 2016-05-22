<?php
require('config2.php'); // Requires config.php so we can access the database.	
	
	$query1 = mysql_query("select * from ae.authentication where account = '".$_GET['account']."' and fname like '%".$_GET['firstname']."%' or account = '".$_GET['account']."' and lname like '%".$_GET['lastname']."%'  ");
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
	}else{
		$query2 = mysql_query("select * from ae.authentication where fname like '%".$_GET['firstname']."%' and lname like '%".$_GET['lastname']."%'  ");
		if(mysql_num_rows($query2) > 0) {
			
			$array2 = array();
			while($result2 = mysql_fetch_array($query2)){			
				$account = $result2['account'];
				$first_name = $result2['fname'];
				$last_name = $result2['lname'];
				$username = $result2['username'];
				//array_push($array, $first_name, $last_name, $username);
				
				  array_push($array2, array(
					"account" => $account,
					"fname" => $first_name,
					"lname" => $last_name,
					"username" => $username
					));
			}
			
			echo json_encode($array2);
		
		}
	}
	
			
?>