<?php 
session_start();
include "header.php"; 
?>


<p class="main">
<div class="mainHeader">
    Welcome To My POS System
</div>
<br>
<!--<div class="button">
    <form action="signUp.php">
        <input type="submit" value="Sign In" name="singIn"/>
    </form>
</div>-->

<div class="button">
    <form action="logIn.php" method="post">
    User Name:<input type="text" name="userName"/>
    <br>
    Password:<input type="text" name="password"/>
        <input type="submit" value="Sign In" name="singIn"/>
    </form>
    <form action="signUp.php">
        <input type="submit" value="Create Account" name="createAccount" />
    </form>
</div>


</p>
MAIN PAGE INFORMATION - This web site is.....


<?php include "footer.php"; ?>

