<?php
include "header.php"; 
if($_COOKIE['LoggedIn'] == 'TRUE')
    echo 'Hello ' . $_COOKIE['userName'];
?>
<br>
<br>
WELCOME TO THE CONTENT PAGE!
<?php include "footer.php"; ?>