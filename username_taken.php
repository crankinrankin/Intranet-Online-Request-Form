<?php
$alert4 = "
<script language='javascript' type='text/javascript'>
function showAlert() {
 alert('Sorry that username is already taken');
}
</script>"
?>

<?php
$data1 = 1;
if ($data1 == 1){
$onClick10="onClick='showAlert();'";
}else{
$onClick="";
}
?>

<?php
echo "<form name = 'requestform' method='post' $onClick10 >";
?>

<?php
$data1 = 1;
if ($data1 == 1){
echo $alert4;
}
?>

<input type='button' type='submit' value='Submit Request' name='Submit'></p>





