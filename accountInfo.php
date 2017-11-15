<?php
session_start();
include 'header.php';

$mysqli = new mysqli('127.0.0.1', 'root', '', 'new_schema');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

$sql = 'select name as Name, address as Address, email as Email, balance as Balance, role as Role from authorizedusers join customers on customer_id = au_id where au_id = '.$_SESSION['au_id'];
$queryResult = $mysqli->query($sql);
$custInfo = $queryResult->fetch_assoc();

//echo $custInfo;
echo 'CUSTOMER INFO:<br>';
echo 'Name: '. $custInfo['Name'] . '<br>';
echo 'Address: '. $custInfo['Address'] . '<br>';
echo 'Email: '. $custInfo['Email'] . '<br>';
echo 'Role: '. $custInfo['Role'] . '<br>';
echo 'Balance: '. $custInfo['Balance'] . '<br><br><br>';

$sql = 'select * from orders_info where Customer_ID = '.$_SESSION['au_id'];
$queryResult = $mysqli->query($sql);

echo 'ORDERS INFO:<br>';
?>

<table>
            <tr>
                <td>Product Name</td>
                <td>Product Price</td>
                <td>Quantity</td>
                <td>Total</td>
                <td>Date</td>
            </tr>

            <?php
               while ($row = $queryResult->fetch_assoc()) {?>
                   <tr>
                   <td><?php echo $row['Product Name'];?></td>
                   <td><?php echo $row['Product Price'];?></td>
                   <td><?php echo $row['Quantity'];?></td>
                   <td><?php echo $row['Total'];?></td>
                   <td><?php echo $row['Date'];?></td>
                   </tr>
              <?php  } ?>
        </table>

<?php
include 'footer.php';
?>

