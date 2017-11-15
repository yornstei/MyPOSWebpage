<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    if (file_exists($target_file)){
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$mysqli = new mysqli('127.0.0.1', 'root', '', 'new_schema');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}
$image = addslashes(file_get_contents($target_file));
        
        
$imgUpSuccess = false;
$sql = "INSERT INTO `inventory`(`price`, `quantity`, `prod_desc`, `prod_img`, `prod_name`) VALUES (".$_POST['prodPrice'].", ".$_POST['prodQuantity'].", '".$_POST['prodDesc']."', '$image','".$_POST['prodName']."')";
$mysqli->query($sql);

if ($mysqli->affected_rows <= 0) {
    
    echo "Sorry, the website is experiencing problems.";

    echo "Error: Our query failed to execute and here is why: \n";
//    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
else
{
    echo '<br>HOPEFULLY WORKED';
    $imgUpSuccess = true;
}




$mysqli->close();
?>