<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<title>Search</title>
<style type="text/css">
	<?if (!$css){$css = "css.css";}echo "@import \"$css\";";?></style>
<body>
<?php

	$db = mysql_connect("your mysql db ip here", "your mysql db pass here", "your mysql db password here") or die("error connecting");




if($submitted <> 1){
echo"<form action=search.php method=post><div id=body>
<input type=hidden value=1 name=submitted>
<table class=head><tr><td>Login Search<tr><td>
<input type=text name=search size=40>
<br>
<input type=submit class=submit value=Search> <input type=reset class=submit value=Reset>
</form>";
//ENDS SEARCH PAGE
}else{	
//*******************************************************************
//*******************************************************************
//                   BEGINS QUERY FOR SEARCH RESULTS
//*******************************************************************
//*******************************************************************

	if($_POST['search'] == ''){
		echo"<table class=table4><tr><td class=head2 colspan=15>Your search does not contain any terms.";
	}else{
		$row = 'class=lightrow';
		$array=array();
			
			
		echo"<table class=table2><tr><td class=head2 colspan=15>Search Results<tr class=cols><td>First Name<td>Last Name<td>Account#<td>Customer<td>UserName<td>Password</tr>";
		
		$my_search = $_POST['search'];

		$array_search = explode(" ",$my_search);
		foreach($array_search as $search){
			
			$query_acc = mysql_query("select username from ae.authentication where account like '%$search%' group by username",$db);
			
			while($result_acc = mysql_fetch_array($query_acc)){
				
				if (array_key_exists($result_acc['username'], $array)) {
					$array[$result_acc['username']]+=1;}
					else{$array[$result_acc['username']]=1;}
				
			}
		
			$query_fname = mysql_query("select username from ae.authentication where fname like '%$search%' group by username",$db);
			
			while($result_fname = mysql_fetch_array($query_fname)){
				if (array_key_exists($result_fname['username'], $array)) {
					$array[$result_fname['username']]+=3;}
					else{$array[$result_fname['username']]=1;}
			
			}
		
			$query_lname = mysql_query("select username from ae.authentication where lname like '%$search%' group by username",$db);
			
			while($result_lname = mysql_fetch_array($query_lname)){
				if (array_key_exists($result_lname['username'], $array)) {
					$array[$result_lname['username']]+=2;}
					else{$array[$result_lname['username']]=1;}
				
			}
			
			$query_user = mysql_query("select username from ae.authentication where username like '%$search%' group by username",$db);
			
			while($result_user = mysql_fetch_array($query_user)){
				if (array_key_exists($result_user['username'], $array)) {
					$array[$result_user['username']]+=1;}
					else{$array[$result_user['username']]=1;}
			
			}
			
			$query_cust = mysql_query("select cmaster.c_name,authentication.username from datastore.cmaster,ae.authentication where cmaster.c_name like '%$search%' and trim(c_number) like account group by username",$db);
		
			while($result_cust = mysql_fetch_array($query_cust)){
				if (array_key_exists($result_cust['username'], $array)) {
					$array[$result_cust['username']]+=4;}
					else{$array[$result_cust['username']]=1;}
					
			}
			
		}
		arsort($array);
		$first = current($array);
		foreach($array as $user => $value){
		
			if($value == $first){$bold = 'class=alert';}else{$bold = '';}
				
			$query = mysql_query("select authentication.* from ae.authentication where username = '$user' group by username",$db);
			
			
				
			while($result = mysql_fetch_array($query)){
				
				if(strstr($result['account'],':')){
					$customer = '';
					$account = str_replace(":","<br>",$result['account']);
				}else{
					$account = $result['account'];
					$query_customer = mysql_query("select c_name from datastore.cmaster where c_number = '      $account' group by c_name",$db);
						while($result_customer = mysql_fetch_array($query_customer)){
						$customer=$result_customer['c_name'];
						}
						
				}
				
				echo"<tr $row><td $bold>".$result['fname']."<td $bold>".$result['lname']."<td $bold>".$account."<td $bold>".$customer."<td $bold><a href='https://www2.officesupply-link.com/4795/DealerStation/Catalog/News.asp?login=1&user=".$result['username']."&pw=".$result['password']."'>".$result['username']."</a><td $bold>".$result['password'];
				if($row == 'class=lightrow'){$row = 'class=darkrow';}else{$row = 'class=lightrow';}
				
			}
		}
	}
}


?>
</body>
</html>