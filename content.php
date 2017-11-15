<?php
session_start();
include "header.php"; 

if($_COOKIE['LoggedIn'] == 'TRUE')
    echo 'Hello ' . $_COOKIE['userName']. '. Your Current Balance Is $'. $_SESSION['balance'];
?>
<br>
<br>
WELCOME TO THE CONTENT PAGE! <br> Select the check box by the item you'd like and select the quantity<br>
<br>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'new_schema');

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
echo '<form action="placeOrder.php" method="post">';

$products = array();
while($row = $result->fetch_assoc()){
        $products[$i]=$row;
        $img = $row['prod_img'];
        echo 'Item #'. ($i+1) . '<br>';
        echo 'Product Name: ' . $row['prod_name']. '<br>';
        echo '<input type="checkbox" name="item_'. ($i) .'"/><br>';
        echo '<img src="data:image/jpeg;base64,'.base64_encode($img) .'" /><br>';
        echo 'Product Description: '. $row['prod_desc'].'<br>';
        echo 'Price: $'. $row['price'].'<br>';
        echo 'Quantity: <select name="quantity'.$i.'">';
        for($j = $row['quantity']; $j > 0; $j--)
        {
            echo '<option value="'.$j . '" SELECTED>'.$j;
        }
        echo '</select><br><br>';
        
        
        $i++;
}
$_SESSION['products'] = $products;

echo '<input type="submit" name="submit_button" value="Place Order" /></form>';
$result->free();
$mysqli->close();
?>

<?php include "footer.php"; ?>