<?php
session_start();
include "header.php"; 
?>
<br>
WELCOME TO THE ITEMS PAGE! <br> Create An Account Or Sign In For Shopping.<br>
<br>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'mypossystem');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

$sql = "SELECT * FROM inventory";
if (!$result = $mysqli->query($sql)) {
    
    echo "Sorry, the website is experiencing problems.";

    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    echo "We could not find any products in the data base. Please try again.";
    exit;
}

$i = 0;
echo '<div id="slideshow">';
while($row = $result->fetch_assoc()){
        $img = $row['prod_img'];
        
        if($i===0)
            echo '<img src="data:image/jpeg;base64,'.base64_encode($img) .'" alt="Slideshow Image 1" class="active" />';
        else
            echo '<img src="data:image/jpeg;base64,'.base64_encode($img) .'" alt="Slideshow Image 1"/>';
        $i++;
}
echo '</div>';

echo 'numofrows'.$result->num_rows;

$result->free();
$mysqli->close();
?>

<?php include "footer.php"; ?>