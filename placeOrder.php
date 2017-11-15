<?php session_start();
include 'header.php';

$products = $_SESSION['products'];

//echo $products;
//
//foreach($products as $array)
//{
//  echo $array['prod_name'];
//}
//if(array_key_exists('item_1', $_POST))
//{
//    echo 'item1';
//}
//
//if(array_key_exists('item_2', $_POST))
//{
//    echo 'item2';
//}

$total = 0;

$sqlInsertOrder = '';
$sqlUpdateInventory = '';
$rowsEffected = 0;

for($i = 0; $i < count($products); $i++)
{
    if(array_key_exists('item_'.$i, $_POST))
    {
        $q = $products[$i]['quantity'];
        $p = $products[$i]['prod_id'];
        
        $sqlInsertOrder .= "insert into orders(prod_id, prod_quntity, order_total, cust_id, order_dt) values(".$products[$i]['prod_id'].", ". $_POST['quantity'.$i] .", ".($products[$i]['price'] * $_POST['quantity'.$i]).", ".$_SESSION['au_id'].", '". date('Y-m-d h:i:s', time())."');";
        $sqlUpdateInventory .= "update inventory set quantity = ". (intval($q) - intval($p)). " where prod_id = ". $products[$i]['prod_id'].";";
        
        $rowsEffected++;
        
        $total += $products[$i]['price'] * $_POST['quantity'.$i];
    }
}

//echo $sqlInsertOrder;
//echo $sqlUpdateInventory;


$mysqli = new mysqli('127.0.0.1', 'root', '', 'new_schema');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}


if(($_SESSION['balance'] + $total) > 225)
{
    header( "refresh:5; url=content.php" ); 
    echo 'Your Orders Total + Your Balance ('.($_SESSION['balance'] + $total). ') Is Greater Than The Limit ($25) Allowed.';
}
else
{
    $sql = 'update customers set balance = '. ($_SESSION['balance'] + $total) .' where customer_id = '. $_SESSION['au_id'];
    $mysqli->query($sql);
    
    if($mysqli->affected_rows > 0)
    {
        echo 'Thanks For Placing The Order.<br><br>The Total Added To You Balance Is $'.$total . '. Your current balance is $'. ($_SESSION['balance'] + $total);
        
        $mysqli->multi_query($sqlInsertOrder);
        if($mysqli->affected_rows > 0)
            echo '<br>Orders Was Inserted.';
        else
            echo 'Error Inserting Orders. error: '. $mysqli->errno;
        
        $mysqli->multi_query($sqlUpdateInventory);
        if($mysqli->affected_rows > 0)
            echo '<br>Inventory Updated';
        else
            echo 'Error Updating Inventory. error: '. $mysqli->errno;
    }
    else
        echo 'There Was An Error Updating Your Balance. error: '. $mysqli->errno;
    
}
    echo '<br><br><form action="accountInfo.php">
        <input type="submit" value="View My Info" name="viewInfo" />
    </form>';

$mysqli->close();

 include 'footer.php';
 ?>
