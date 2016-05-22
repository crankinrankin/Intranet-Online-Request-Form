<script>
<!-- This script custom wrote by Clint Rankin on 6/5/2009  ----->
<!-- If eci radio button is selected then it checks the text box field for certain key words then pops up a confirm box if salesperson typed that word or phrase in the box.
function checkwords(cur){

	if (requestform.shoppingcart[1].checked==true) {
		var nope = Array("change username","username","login","screenname","name","change login","switch username","switch login","switch their username","switch their login","switch there username","switch there login","username changed","change their username","change there username","CHANGE USERNAME","USERNAME","LOGIN","SCREENNAME","NAME","CHANGE LOGIN","SWITCH USERNAME","SWITCH LOGIN","SWITCH THEIR USERNAME","SWITCH THEIR LOGIN","SWITCH THERE USERNAME","SWITCH THERE LOGIN","USERNAME CHANGED","CHANGE THEIR USERNAME","CHANGE THERE USERNAME");
		  var temp=cur.comment.value
			for (var i = 0; i < nope.length; i++){
				if (temp.indexOf(nope[i]) > -1){
					var testImg = new Image(); // Since you can not invoke a php script within javascript Im calling what javascript thinks is an image when its really a php file that when called will email me because Im curious how useful this script will be.
					testImg.src = "http://192.168.1.195/admin/addapass/paidoffemail.php?email=<?php echo $email;?>&empname=<?php echo $empname;?>"; 
					if(confirm("Please note that Usernames can not be changed on the new shopping platform like they could on the old site.\n\nIf this is what you are trying to do, please follow these steps.... \n1) Hit Cancel \n2) Fill out the form for a New Login an in the Additional Notes section specify the username you would like deleted\n3) If they had a favs list it will be lost. To save it you will need to key items in manually so do not ask for the old username to be deleted until you have recreated their favs list first.\n\n Else hit OK to submit this page.")) {
						return true // allow form submission
						}else{
						return false // deny form submission
						}
				}
			}
	}
}
</script>


