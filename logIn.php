<?php 
if(array_key_exists ('userName', $_POST) && array_key_exists ('password', $_POST))
{
    $user = $_POST['userName'];
    $pass = $_POST['password'];
}


$mysqli = new mysqli('127.0.0.1', 'root', '', 'mypossystem');

if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}

$sql = "SELECT * FROM authorizedusers WHERE user_name = '$user'";
if (!$result = $mysqli->query($sql)) {
    
    echo "Sorry, the website is experiencing problems.";

    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if ($result->num_rows === 0) {
    echo "We could not find a match for ID $user, sorry about that. Please try again.";
    exit;
}

$userRec = $result->fetch_assoc();
echo "we found " . $actor['first_name'] . " " . $actor['last_name'] . " on TV.";
if ($userRec['password'] == $pass)
{
    setcookie('LoggedIn', 'TRUE');
    setcookie('userName', $_POST['userName']);
    header("Location:content.php");
    exit();
}
else
{
    setcookie('LoggedIn', 'FALSE');
    header( "refresh:5; url=index.php" ); 
    echo 'Incorrect User Name Or Password.';
}


$result->free();
$mysqli->close();

//$valid = array();
//$valid[0] = array('user' => 'Joe', 'password' => '1234');
//$valid[1] = array('user' => 'Mike', 'password' => '3334');
//$valid[2] = array('user' => 'Emily', 'password' => '1204');
//$valid[3] = array('user' => 'Zack', 'password' => '1288');
//$valid[4] = array('user' => 'Dave', 'password' => '3234');
//
//$validAccount = false;
//foreach($valid as $v)
//{
//    if(array_key_exists ('userName', $_POST) && array_key_exists ('password', $_POST))
//    {
//    if($v['user'] == $_POST['userName'] && $v['password'] == $_POST['password'])
//    {
//        $validAccount = TRUE;
//    }
//    }
//}
//
//if($validAccount)
//{
//    setcookie('LoggedIn', 'TRUE');
//    setcookie('userName', $_POST['userName']);
//    header("Location:content.php");
//    exit();
//}
//else
//{
//    setcookie('LoggedIn', 'FALSE');
//    header( "refresh:5; url=index.php" ); 
//    echo 'Incorrect User Name Or Password.';
//}
?>


