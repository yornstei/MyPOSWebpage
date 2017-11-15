<?php
include 'header.php';
?>

<h1>
    Sign Up Form
</h1>
<form action="mail.php" method="post">
Full Name: <input type="text" name="customerName" value="" /><br>
Email: <input type="text" name="emailAddress" value="" /><br>
Title: <input type="text" name="title" value="" /><br>
Tell Us More:<br><textarea name="about" rows="10" cols="60" wrap="virtual">
Type Here
</textarea><br>

<input type="submit" name="submit_button" value="Email Us" />
</form>


<?php
include 'footer.php';
?>

