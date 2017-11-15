<?php
include "header.php"; 

if(isset($_COOKIE['role']) & $_COOKIE['LoggedIn'] == 'TRUE' & $_COOKIE['role'] == 'admin')
    echo 'Hello ' . $_COOKIE['userName'];
else
    header("Location:index.php");
?>
<br>
<br>
WELCOME TO THE ADMIN PAGE!

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    Name: <input type="text" name="prodName" value="" /><br>
    Description: <input type="text" name="prodDesc" value="" /><br>
    Quantity: <input type="text" name="prodQuantity" value="" /><br>
    Price: <input type="text" name="prodPrice" value="" /><br>

    <input type="submit" value="Submit New Product" name="submit">
</form>

<?php include "footer.php"; ?>