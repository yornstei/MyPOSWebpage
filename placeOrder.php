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

for($i = 0; $i < count($products); $i++)
{
    if(array_key_exists('item_'.$i, $_POST))
    {
        $total += $products[$i]['price'] * $_POST['quantity'.$i];
    }
}

if($total > 25)
{
    header( "refresh:5; url=content.php" ); 
    echo 'You Orders Total Is Greater Than The Limit ($25) Allowed.';
}
else
{
    echo 'Thanks For Placing The Order.<br><br>The Total Added To You Balance Is $'.$total;
}
 include 'footer.php';
 ?>
