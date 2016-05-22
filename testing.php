<?
$db = mysql_connect("your mysql db ip here", "your mysql db username here", "your mysql db password here") or die("error connecting");
$query = mysql_query("select p_s_quanti, p_pay_code from ae.history where fulldate > date_sub(now(), interval 12 month) and p_i_number='12305' and p_i_color='AVE'");
$total = 0;
while  ($row=mysql_fetch_array($query)) {
		$quanity=$row['p_s_quanti'];
		$paycode=$row['p_pay_code'];
		
		if($paycode == '5'){
		$total -= $row['p_s_quanti'];
		}else{
		$total += $row['p_s_quanti'];
		
		}

}
echo "<br>$total<br/>";
?>