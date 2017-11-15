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
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php include "footer.php"; ?>