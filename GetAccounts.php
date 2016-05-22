<?php

function __json_encode( $data ) {           
    if( is_array($data) || is_object($data) ) {
        $islist = is_array($data) && ( empty($data) || array_keys($data) === range(0,count($data)-1) );
       
        if( $islist ) {
            $json = '[' . implode(',', array_map('__json_encode', $data) ) . ']';
        } else {
            $items = Array();
            foreach( $data as $key => $value ) {
                $items[] = __json_encode("$key") . ':' . __json_encode($value);
            }
            $json = '{' . implode(',', $items) . '}';
        }
    } elseif( is_string($data) ) {
        # Escape non-printable or Non-ASCII characters.
        # I also put the \\ character first, as suggested in comments on the 'addclashes' page.
        $string = '"' . addcslashes($data, "\\\"\n\r\t/" . chr(8) . chr(12)) . '"';
        $json    = '';
        $len    = strlen($string);
        # Convert UTF-8 to Hexadecimal Codepoints.
        for( $i = 0; $i < $len; $i++ ) {
           
            $char = $string[$i];
            $c1 = ord($char);
           
            # Single byte;
            if( $c1 <128 ) {
                $json .= ($c1 > 31) ? $char : sprintf("\\u%04x", $c1);
                continue;
            }
           
            # Double byte
            $c2 = ord($string[++$i]);
            if ( ($c1 & 32) === 0 ) {
                $json .= sprintf("\\u%04x", ($c1 - 192) * 64 + $c2 - 128);
                continue;
            }
           
            # Triple
            $c3 = ord($string[++$i]);
            if( ($c1 & 16) === 0 ) {
                $json .= sprintf("\\u%04x", (($c1 - 224) <<12) + (($c2 - 128) << 6) + ($c3 - 128));
                continue;
            }
               
            # Quadruple
            $c4 = ord($string[++$i]);
            if( ($c1 & 8 ) === 0 ) {
                $u = (($c1 & 15) << 2) + (($c2>>4) & 3) - 1;
           
                $w1 = (54<<10) + ($u<<6) + (($c2 & 15) << 2) + (($c3>>4) & 3);
                $w2 = (55<<10) + (($c3 & 15)<<6) + ($c4-128);
                $json .= sprintf("\\u%04x\\u%04x", $w1, $w2);
            }
        }
    } else {
        # int, floats, bools, null
        $json = strtolower(var_export( $data, true ));
    }
    return $json;
} 

if(isset($_GET['check'])){ // THIS AREA IS FOR DISPLAYING PREPAY ACCOUNT INFORMATION
	require('config2.php');
	$account1=stripslashes(strip_tags(htmlspecialchars($_GET['check'], ENT_QUOTES)));
	$query1 = mysql_query("select IF(c_prepay = '', 'N', c_prepay) as prepay from datastore.cmaster where ltrim(c_number) = '$account1' and c_dept = '' limit 1");
	if(mysql_num_rows($query1) > 0) {
		while($result1 = mysql_fetch_array($query1)){
			$prepay = $result1['prepay'];
			}
		echo $prepay;
		}else{
			echo 'No Data';
		}
}

if(isset($_GET['account4loc'])){ // THIS AREA IS FOR DISPLAYING LOCATION INFORMATION FOR SPECIFIED ACCOUNT
	require('config2.php');
	$account1=stripslashes(strip_tags(htmlspecialchars($_GET['account4loc'], ENT_QUOTES)));
	//ORIGINAL QUERY...LOCATION NOT ALWAYS CORRECT E.G. 6692 9443 1049 2426 7805 ETC $query1 = mysql_query("select ltrim(cd_loc) as location from datastore.cmaster left join datastore.cdisc on c_number =  cd_key where cd_loc in (1,2,3,4) and ltrim(c_number) = '$account1' and c_dept = '' order by location desc limit 1;");
	$query1 = mysql_query("select 
   case cd_status
		when 'G' then '1'
		when 'A' then '1'
		when 'J' then '2'
		when 'B' then '2'
		when 'L' then '3'
		when 'C' then '3'
		when 'N' then '4'
		when 'D' then '4'
		when 'O' then '5'
		when 'E' then '5'
		when 'Z' then 'employee'
   end as location
from datastore.cdisc where trim(cd_key) = '$account1' group by cd_key;");
	if(mysql_num_rows($query1) > 0) {
		while($result1 = mysql_fetch_array($query1)){
			$location = $result1['location'];
			}
		echo $location;
	}else{
		echo 'No Data';
	}
}


if(isset($_GET['account'])){ // THIS AREA IS FOR DISPLAY DEPARTMENTS
	usleep(200000); // half a second
	$prepay = '';

	$account=stripslashes(strip_tags(htmlspecialchars($_GET['account'], ENT_QUOTES)));
	$options = "<option value='' class='' style=''>&nbsp;</option>";
	require('config2.php'); // Requires config.php so we can access the database.	
	//$query1 = mysql_query("select ltrim(c_number) as account, c_name as company from datastore.cmaster where c_number REGEXP('[0-9]') and c_number not in (1,'EDI810') group by c_number order by c_number");
	//$query1 = mysql_query("select IF(c_dept = '', NULL, c_dept) as dept, ltrim(cd_loc) as location, IF(c_prepay = '', 'N', c_prepay) as c_prepay from datastore.cmaster left join datastore.cdisc on c_number =  cd_key where cd_loc in (1,2,3,4) and ltrim(c_number) = '$account' and c_dept != '' group by c_dept order by c_dept,location desc");
	//$query1 = mysql_query("select IF(c_dept = '', NULL, c_dept) as dept, IF(c_prepay = '', 'N', c_prepay) as prepay, cd_statu6 as order_entry_exempt from datastore.cmaster left join datastore.cdisc on c_number =  cd_key where ltrim(c_number) = '$account' and c_dept != '' group by concat(c_number,c_dept) order by c_dept ASC;");
	//$query1 = mysql_query("select IF(c_dept = '', NULL, c_dept) as dept, IF(c_prepay = '', 'N', c_prepay) as prepay, cd_statu6 as order_entry_exempt from datastore.cmaster left join datastore.cdisc on concat(c_number,c_dept) =  cd_key where ltrim(c_number) = '$account' and c_dept != '' group by concat(c_number,c_dept) order by c_dept ASC;");
	//REGULAR EXPRESSION IS QUERY BELOW WILL DETECT IF DATE IS NUMERIC AND IT SO IT WILL SORT DEPT FIELD CORRECTLY. WITHOUT THIS LOGIC IT WOULD NORMALLY SORT NUMERIC DEPTS LIKE THIS... 09 100 INSTEAD OF 09 10 11 ETC ETC. 
	$query1 = mysql_query("select IF(c_dept = '', NULL, c_dept) as dept, IF(c_prepay = '', 'N', c_prepay) as prepay, cd_statu6 as order_entry_exempt 
		from datastore.cmaster left join datastore.cdisc on concat(c_number,c_dept) =  cd_key 
		where ltrim(c_number) = '$account' 
		and c_dept != '' group by concat(c_number,c_dept) order by IF(c_dept REGEXP '^-?[0-9]+$', dept+400, dept) ASC;");
	
	if(mysql_num_rows($query1) > 0) {
	while($result1 = mysql_fetch_array($query1)){			
		$dept = $result1['dept'];
		$prepay = $result1['prepay'];
		$order_entry_exempt = $result1['order_entry_exempt'];
		$query2 = mysql_query("select ci_dept_de from cinfo where ltrim(ci_key) like '$account$dept%' limit 1;");
		while($result2 = mysql_fetch_array($query2)){
			$dept_description = $result2['ci_dept_de'];
		}
		if($order_entry_exempt != ''){
			//$order_entry_exempt_alert = 'BLOCKED';
			$class = "class='mystri' style='color: red;'";
		}else{
			//$order_entry_exempt_alert = '';
			$class = '';
		}
	$options .= "<option value=\"".$result1['dept'].",$prepay,$order_entry_exempt\" $class>".$result1['dept']."&nbsp - $dept_description</option>";				
	}
	echo $options;
	}else{
		$query1 = mysql_query("select IF(c_prepay = '', 'N', c_prepay) as prepay from datastore.cmaster left join datastore.cdisc on c_number =  cd_key where ltrim(c_number) = '$account' limit 1;");
		while($result1 = mysql_fetch_array($query1)){
			$prepay = $result1['prepay'];
		}
		$options = "<option value='NoDepts,$prepay' class='' style=''>No Depts On This Acct</option>";
		echo $options;
	}
	//echo __json_encode($array);
}

if(isset($_GET['orderentry'])){ // THIS AREA IS FOR checking if the account & dept combination is on order entry exempt
	require('config2.php');
		
	$account2=stripslashes(strip_tags(htmlspecialchars($_GET['account2'], ENT_QUOTES)));
	$dept2=stripslashes(strip_tags(htmlspecialchars($_GET['dept2'], ENT_QUOTES)));
	$dept2 = str_replace("\r", "", $dept2);
	$dept2 = str_replace("\n", "", $dept2);
	$query1 = mysql_query("select cd_statu6 as order_entry_exempt from datastore.cdisc where trim(cd_key) = concat('$account2','$dept2') and cd_statu6 != '';");
	if(mysql_num_rows($query1) > 0) {
		while($result1 = mysql_fetch_array($query1)){
			$order_entry_exempt = $result1['order_entry_exempt'];
		}
		echo $order_entry_exempt;
	}else{
		echo 'fine';
		}
}
?>