<?php
if(!isset($_GET['username'])){ // If they are trying to view this without ?username=username or ?password=password.
    die("What’s this document for?"); // Lawl what is this document for anyways?
}elseif(isset($_GET['username'])){ // ElseIf they are want to check their username.
    require('config.php'); // Requires config.php so we can access the database.
    $user=stripslashes(strip_tags(htmlspecialchars($_GET['username'], ENT_QUOTES))); // Cleans all nasty input from the username.
    $check=mysql_num_rows(mysql_query("SELECT * FROM `authentication` WHERE `username` = '".$user."'")); // Checks to see if a user is in the `users` table or not.
    
        if($check == 0){ // If there is no username in the database that matches the input one.
            echo ''.$user.' is <span style="color:#009933">Available!</span>'; // Yay we can use it.
        }elseif($check != 0){ // ElseIf there is a username in the database.
            echo ''.$user.' is <span style="color:#CC0000">Not Available!</span>'; // None for you higgans.
        } // End ElseIf.
        
} // End ElseIf.
?>

